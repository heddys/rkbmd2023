/**
 * SI-IBMD SURABAYA - INTERACTIVE LOGIN SCRIPTS
 */

$(document).ready(function() {
  'use strict';

  /* ==========================================================================
     1. FLOATING LABELS INPUT STATE TRACKING
     ========================================================================== */
  function checkInputVal(input) {
    var $group = $(input).closest('.form-group-custom');
    if (input.value.trim() !== "") {
      $group.addClass('field--not-empty');
    } else {
      $group.removeClass('field--not-empty');
    }
  }

  // Check on load (for autofilled credentials)
  $('.form-input').each(function() {
    checkInputVal(this);
  });

  // Check on input event
  $('.form-input').on('input focus blur change', function() {
    checkInputVal(this);
  });


  /* ==========================================================================
     2. PASSWORD SHOW/HIDE TOGGLE
     ========================================================================== */
  $('#password-toggle').on('click', function(e) {
    e.preventDefault();
    var $passwordInput = $('#password');
    var $icon = $(this).find('i');

    if ($passwordInput.attr('type') === 'password') {
      $passwordInput.attr('type', 'text');
      $icon.removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
      $passwordInput.attr('type', 'password');
      $icon.removeClass('fa-eye').addClass('fa-eye-slash');
    }
  });


  /* ==========================================================================
     3. FORM SUBMISSION LOADING STATE
     ========================================================================== */
  $('#login-form').on('submit', function() {
    var $btn = $('#submit-btn');
    var $text = $btn.find('.btn-text');
    var $spinner = $btn.find('.btn-spinner');

    // Show spinner and hide text
    $text.addClass('hidden');
    $spinner.removeClass('hidden');

    // Disable button to prevent double submits
    $btn.prop('disabled', true);
  });


  /* ==========================================================================
     4. CANVAS PARTICLE INTERACTIVE BACKGROUND
     ========================================================================== */
  var canvas = document.getElementById('particle-canvas');
  if (canvas) {
    var ctx = canvas.getContext('2d');
    var particles = [];
    var maxParticles = 65; // Balanced performance
    var mouse = { x: null, y: null, radius: 150 };

    // Set canvas sizes
    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // Track mouse coordinates
    window.addEventListener('mousemove', function(e) {
      mouse.x = e.x;
      mouse.y = e.y;
    });

    window.addEventListener('mouseout', function() {
      mouse.x = null;
      mouse.y = null;
    });

    // Particle Object Blueprint
    function Particle(x, y, vx, vy, size, color) {
      this.x = x;
      this.y = y;
      this.vx = vx;
      this.vy = vy;
      this.size = size;
      this.color = color;
    }

    Particle.prototype.draw = function() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
      ctx.fillStyle = this.color;
      ctx.fill();
    };

    Particle.prototype.update = function() {
      // Bounce check x bounds
      if (this.x + this.size > canvas.width || this.x - this.size < 0) {
        this.vx = -this.vx;
      }
      // Bounce check y bounds
      if (this.y + this.size > canvas.height || this.y - this.size < 0) {
        this.vy = -this.vy;
      }

      this.x += this.vx;
      this.y += this.vy;

      // Mouse interactive push/pull effect
      if (mouse.x !== null && mouse.y !== null) {
        var dx = mouse.x - this.x;
        var dy = mouse.y - this.y;
        var distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < mouse.radius) {
          // Subtle attraction toward mouse
          var force = (mouse.radius - distance) / mouse.radius;
          this.x -= (dx / distance) * force * 1.5;
          this.y -= (dy / distance) * force * 1.5;
        }
      }

      this.draw();
    };

    // Initialize particles
    function init() {
      particles = [];
      for (var i = 0; i < maxParticles; i++) {
        var size = (Math.random() * 2) + 1;
        var x = Math.random() * (canvas.width - size * 2) + size;
        var y = Math.random() * (canvas.height - size * 2) + size;
        var vx = (Math.random() * 0.8) - 0.4;
        var vy = (Math.random() * 0.8) - 0.4;

        // Surabaya-theme colors: shades of emerald and subtle blues/cyan
        var colors = [
          'rgba(16, 185, 129, 0.25)', // Emerald
          'rgba(52, 211, 153, 0.20)', // Light Emerald
          'rgba(2, 132, 199, 0.20)',   // Accent Blue
          'rgba(56, 189, 248, 0.15)'   // Light Cyan
        ];
        var color = colors[Math.floor(Math.random() * colors.length)];

        particles.push(new Particle(x, y, vx, vy, size, color));
      }
    }

    // Connect particles close to each other
    function connect() {
      var opacityValue = 1;
      for (var a = 0; a < particles.length; a++) {
        for (var b = a; b < particles.length; b++) {
          var dx = particles[a].x - particles[b].x;
          var dy = particles[a].y - particles[b].y;
          var distance = Math.sqrt(dx * dx + dy * dy);

          if (distance < 110) {
            opacityValue = 1 - (distance / 110);
            ctx.strokeStyle = 'rgba(255, 255, 255, ' + opacityValue * 0.05 + ')';
            ctx.lineWidth = 1;
            ctx.beginPath();
            ctx.moveTo(particles[a].x, particles[a].y);
            ctx.lineTo(particles[b].x, particles[b].y);
            ctx.stroke();
          }
        }
      }
    }

    // Particle loop animation
    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      for (var i = 0; i < particles.length; i++) {
        particles[i].update();
      }
      connect();
      requestAnimationFrame(animate);
    }

    init();
    animate();
  }

});
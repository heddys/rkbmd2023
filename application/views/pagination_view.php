<!DOCTYPE html>
<html>
<head>
     <title>Tutorial Pagination Codeigniter</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
     <style type="text/css">
          body {
               margin-top: 20px;
          }
     </style>
</head>
<body>
     <div class="row">
          <div class="col-md-offset-2 col-md-8">
               <table class="table table-bordered" border="1" cellspacing="0" cellpadding="5">
                    <thead>
                         <tr>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Tanggal Lahir</th>
                              <th>Umur</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach($semua_pengguna as $pengguna): ?>
                              <tr>
                                   <td><?php echo $pengguna->nama; ?></td>
                                   <td><?php echo $pengguna->jenis_kelamin; ?></td>
                                   <td><?php echo date('j F Y', strtotime($pengguna->tanggal_lahir)); ?></td>
                                   <td><?php echo $pengguna->umur; ?></td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
               </table>
               <nav style="text-align: right;" aria-label="Page navigation">
                    <?php echo $this->pagination->create_links(); ?>
               </nav>
          </div>
     </div>
</body>
</html>
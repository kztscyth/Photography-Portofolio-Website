<?php include('koneksi.php');
    $query = mysqli_query($koneksi,"SELECT * FROM tb_gambar");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Artworks!</title>
        <style media="screen">
            h1{
                color: #555;
                padding-top: 10px;
                padding-bottom: 10px;
                margin: 20px;
                text-align: center;
                font-size: 50px;
                font-family: PopLight;
            }

            .content{
                justify-self:center;
                align:center;
                color: white;
                position: center;
                background: linear-gradient(to right, #5f5f79, #555);
                text-align:center;
                border:none;
                width:100%;
                font-size:20px;
                text-decoration: none;
                font-family: PopLight;
            }

            .cta-add
            {
                display:grid;
                text-align:center;
                border :none;
                height: 45px;
                color:white;
                font-size: 25px;
                background: #5f5f79;
                cursor :pointer;
                border-radius:10px;
                font-family: PopRegular;
                text-decoration: none;
                padding:5px;
            }

            .font{
                font-size:20px;
                margin-left:20px;
                margin-right:40px;
                font-family: PopRegular;
            }

            .area{
                font-size:20px;
                font-family: PopLight;
                color:#555;
                border-radius:5px;
            }

            .pad{
                padding:10px;
            }

            .del{
                color:maroon;
                text-decoration: none;
            }

            @media screen and (max-width : 1000px){
                body{
                    flex-direction: column;
                }

                h1{
                font-size: 30px;
                }

                .content{
                    font-size:80%;
                }

                .cta-add{
                    height: 35px;
                    font-size: 18px;
                    padding:5px;
                }

                .pad{
                    padding:2px;
                }

                .img{
                    width:60%;
                }
                
            }
        </style>
        <link rel="stylesheet" href="./hapus_style.css">
    </head>
    <body>
        <h1>Your Artworks</h1>
        <a href="form_upload.php" class="cta-add" >Upload Your Photo!</a>
        <div class="pad">
            <br>
        </div>
        <table border="1" class="content">
            <tr>
                <th>No</th>
                <th>Images</th>
                <th>Comment</th>
                <th>Type</th>
                <th>Size</th>
                <th>Action</th>
            </tr>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_array($query))
            {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><img src="image_view.php?id_gambar=<?php echo $row['id_gambar']; ?>" width="500" class="img"/></td>
                    <td><?php echo $row['keterangan']; ?></td>
                    <td><?php echo $row['tipe_gambar']; ?></td>
                    <td><?php echo $row['ukuran_gambar']; ?></td>
                    <td><a href="delete_gambar.php?id_gambar=<?php echo $row['id_gambar']; ?>" class="del">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
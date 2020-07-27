<!DOCTYPE html>
<html lang="en">

<?php 
include('koneksi.php');
if(isset($_POST['tombol']))
{
    if(!isset($_FILES['gambar']['tmp_name'])){
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    }
    else
    {
        $file_name = $_FILES['gambar']['name'];
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
        {
            $image   = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            $keterangan = $_POST['keterangan'];
            mysqli_query($koneksi,"insert into tb_gambar (gambar,nama_gambar,tipe_gambar,ukuran_gambar,keterangan) values ('$image','$file_name','$file_type','$file_size','$keterangan')");
            header("location:upload.php");
        }
        else
        {
            echo '<span style="color:red"><b><u><i>Ukuran File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style media="screen">
            h1{
                color: rgb(156, 74, 255);
                padding-top: 10px;
                padding-bottom: 10px;
                margin: 20px;
                text-align: center;
                font-size: 60px;
                font-family: PopLight;
            }

            .table{
                color: white;
                position: absolute;
                top: 40%;
                left: 50%;
                transform: translate(-50%,-50%);
                width: 400px;
                height: 250px;
                padding: 20px 40px;
                background: linear-gradient(to right, rgb(156, 74, 255), #3cdfff);
                border-radius: 10px;
                font-family: PopRegular;
                border:none;
            }

            button,
            [type=submit]
            {
                border :2px solid #555;
                height: 30px;
                color:#555;
                font-size: 18px;
                background: white;
                cursor :pointer;
                width: 30%;
                border-radius:10px;
                font-family: PopRegular;
            }

            button,
            [type=file]
            {
                color:#555;
                font-size: 16px;
                background: white;
                cursor :pointer;
                border-radius:5px;
                font-family: PopRegular;
            }

            .font{
                font-size:20px;
                margin-left:20px;
                margin-right:40px;
                font-family: PopRegular;
            }

            .area{
                font-size:20px;
                font-family: PopRegular;
                color:#555;
                border-radius:5px;
            }

            @media screen and (max-width : 600px){
                h1{
                font-size: 50px;
                }

                .font{
                    font-size:18px;
                }

                .area{
                    font-size:18px;
                }

                .table{
                padding: 40px 10px;
                }
            }

        </style>
        <link rel="stylesheet" href="./hapus_style.css">
        <title>Upload Your Photo!</title>
    </head>
    <body>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="container">
                <h1>Upload</h1>
                <table class="table">
                    <tr class="font">
                        <td>Image</td>
                        <td><input type="file" name="gambar"/></td>
                    </tr>
                    <tr class="font">
                        <td>Comment</td>
                        <td><textarea name="keterangan" class="area" ></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="tombol"/></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">


<head>
    <style>
        
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        <h1 align='center'>Surat Teguran</h1>
        <h3 align='center'><b>SMP __________________</b></h3>
        <br>
        
        <hr>
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- DataTables -->
                <div class="card mb-3">
                <p align='left'>Yang bertanda tangan di bawah ini kepala sekola SMP memberitahukan bahwa sehubungan dengan pelanggaran tata tertib Sekolah yang telah dilakukan oleh putra/putri bapak/ibu :</p>
                <div style="margin-left : 20px;margin-right:20px;">
                <table>
                    <tr>
                        <td>
                            Nama :
                        </td>
                        <td>
                            <?= $siswa['nama'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NISN :
                        </td>
                        <td>
                            <?= $siswa['nisn'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kelas :
                        </td>
                        <td>
                            <?= $siswa['nama_kelas'] ?>
                        </td>
                    </tr>
                </table>
                </div>
                <br>
                <p>Maka dari ini ...</p>
                <p>Demikian ...</p>
                <br><br>
                <div style="width:100%">                   
                    <div style="width:45%;float:left:">
                        Mengetahui,<br>
                        Guru Bimbingan dan Konseling
                        <br>
                        <br>
                        <br>   
                        (............................)
                    </div>
                    <div style="margin-left:55%">
                        <div style="float:right;">
                        Tanggal, ...................<br>
                        Kepala Sekolah
                        <br>
                        <br>
                        <br>   
                        (............................)
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
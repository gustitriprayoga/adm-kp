<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p{
            text-align: right;
        }
    </style>
</head>
<body>
    <h2>Pengajuan Kerja Praktik</h2>
<br>
    <table>    
        <tr>
            <td>
                Nama Mahasiswa : {{$pengajuan->mhs->nama_mhs}}
            </td>
        </tr>
        <tr>
            <td>
                Nim : {{$pengajuan->mhs->nim}}
            </td>
        </tr>
        <tr>
            <td>
                Program Studi : {{$pengajuan->mhs->prodi->prodi}}
            </td>
        </tr>
        <tr>
            <td>
                Tempat Kerja Praktik : {{$pengajuan->tmpt}}
            </td>
        </tr>
    </table>
    <br><br><br><br><br><br>
    <p> Diketahui </p>
    <br><br>
    <p>Novi Yona Sidratul Munti, S.Kom., M.Kom</p>
</body>
</html>


                
                       
                          


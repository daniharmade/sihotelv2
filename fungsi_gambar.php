<?php
function UploadFile($fupload_name)
{
  //direktori file
  $vdir_upload = "images/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);
}

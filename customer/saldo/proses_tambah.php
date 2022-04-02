<?php
                    
                    require_once '../../koneksi.php';
                    if (isset($_POST['simpan'])) {
                   
                 
                    $id_kustomer = mysqli_real_escape_string($koneksi, $_POST['id_kustomer']);
                    $jumlah_topup = mysqli_real_escape_string($koneksi, $_POST['jumlah_topup']);
                    $tanggal_topup = mysqli_real_escape_string($koneksi, $_POST['tanggal_topup']);
                    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];


                    //cek dulu jika ada gambar produk jalankan coding ini
                    if($bukti_pembayaran != "") {
                      $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
                      $x = explode('.', $bukti_pembayaran); //memisahkan nama file dengan ekstensi yang diupload
                      $ekstensi = strtolower(end($x));
                      $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];   
                      $angka_acak     = rand(1,999);
                      $nama_gambar_baru = $angka_acak.'-'.$bukti_pembayaran; //menggabungkan angka acak dengan nama file sebenarnya
                            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                                    move_uploaded_file($file_tmp, '../../admin/bukti/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                                      // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                                      $query = "INSERT INTO topup_saldo (id_topup, id_kustomer, jumlah_topup, tanggal_topup, status_topup, bukti_pembayaran) VALUES (null, '$id_kustomer', '$jumlah_topup', '$tanggal_topup', 'Di Proses', '$nama_gambar_baru')";
                                      $result = mysqli_query($koneksi, $query);
                                      // periska query apakah ada error
                                      if(!$result){
                                          die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                               " - ".mysqli_error($koneksi));
                                      } else {
                                        //tampil alert dan akan redirect ke halaman index.php
                                        //silahkan ganti index.php sesuai halaman yang akan dituju
                                        echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                                      }
                    
                                } else {     
                                 //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
                                }
                    } else {
                        $query = "INSERT INTO topup_saldo (id_topup, id_kustomer, jumlah_topup, tanggal_topup, status_topup, bukti_pembayaran) VALUES (null, '$id_kustomer', '$jumlah_topup', '$tanggal_topup', 'Di Proses', '$nama_gambar_baru')";
                                      $result = mysqli_query($koneksi, $query);
                                      // periska query apakah ada error
                                      if(!$result){
                                          die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                               " - ".mysqli_error($koneksi));
                                      } else {
                                        //tampil alert dan akan redirect ke halaman index.php
                                        //silahkan ganti index.php sesuai halaman yang akan dituju
                                        echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                                      }
                    }
                  }
               ?>
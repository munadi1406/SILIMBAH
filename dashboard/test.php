<?php
        error_reporting(0);
        switch ($_GET['page']) {
          default:
            include "dashboard.php";
            break;
          case "dashboard";
            include "dashboard.php";
            break;
            // mahasiswa 
          case "mahasiswa-show";
            include "../mahasiswa/mahasiswa_show.php";
            break;
          case "mahasiswa-add";
            include "../mahasiswa/mahasiswa_add.php";
            break;
          case "mahasiswa-edit";
            include "../mahasiswa/mahasiswa_edit.php";
            break;
          case "mahasiswa-delete";
            include "../mahasiswa/mahasiswa_delete.php.php";
            break;
          case "mahasiswa-update";
            include "../mahasiswa/mahasiswa_update.php";
            break;
            // user 
          case "user-add";
            include "../user/user_add.php";
            break;
          case "user-show";
            include "../user/user_show.php";
            break;
          case "user-edit";
            include "../user/user_edit.php";
            break;
          case "user-update";
            include "../user/user_update.php";
            break;
            // dosen
          case "add-dosen";
            include "../dosen/add_dosen.php";
            break;
          case "show-dosen";
            include "../dosen/show_dosen.php";
            break;
          case "delete-dosen";
            include "../dosen/delete_dosen.php";
            break;
          case "print-dosen";
            include "../dosen/print_dosen.php";
            break;
          case "edit-dosen";
            include "../dosen/edit_dosen.php";
            break;
          case "update-dosen";
            include "../dosen/update_dosen.php";
            break;
        }
        ?>
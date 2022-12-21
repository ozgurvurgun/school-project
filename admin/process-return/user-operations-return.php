<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
$process = $_GET["process"];
switch ($process) {
    case 'useradd':
        if (isset($_POST['userName'])) {
            $userName = security('userName');
            $password = security('password');
            $nameSurname = security('nameSurname');
            $phone = security('phone');
            $adress =  security('adress');
            $userAuthority =  security('userAuthority');
            if (empty($userName) or empty($nameSurname) or empty($phone) or empty($adress) or empty($userAuthority) or empty($password) or $userAuthority == "0") {
                $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
                <div style="font-size: 20px;">Lütfen Gerekli Alanları Doldurun</div>
                </div>:::';
            } else {
                $isUser =   $db->getRows("SELECT UsersUsername FROM users WHERE UsersUsername=?", [$userName]);
                if ($isUser) {
                    $result = '<div class="alert alert-danger mt-2 mb-3 text-center" role="alert">
                       <div style="font-size: 20px;">Bu kullanıcı Sistemde Zaten Kayıtlı</div>
                       </div>:::';
                } else {
                    $add = $db->insert('INSERT INTO users(UsersUsername,UsersPassword,UsersName,UsersPhone,UsersAddress,UsersAuthority)
                        VALUES (?,?,?,?,?,?)
                        ', [$userName, $password, $nameSurname, $phone, $adress, $userAuthority]);
                    if ($add) {
                        $result = '<div class="alert alert-success mt-2 mb-3 text-center" role="alert">
                        <div style="font-size: 20px;">' . $userName . ' Kullanıcısı Başarı İle Eklendi.</div>
                        </div>:::';
                    } else {
                        $result = '<div class="alert alert-danger mt-2 mb-3 text-center" role="alert">
                        <div style="font-size: 20px;">Kayıt Başarısız.</div>
                        </div>:::';
                    }
                }
            }
            $query = $db->getRows('SELECT * FROM users ORDER BY UsersID DESC');
            $records = $db->getColumn("SELECT COUNT(UsersID) FROM users");
            if ($records < 1) {
                $records = 'Kayıtlı Kullanıcı Yok';
            } else {
                $records = 'Kayıtlı Kullanıcılar - ' . $records . ' adet';
            }

            $query = $db->getRows("SELECT * FROM users ORDER BY UsersID DESC");
            foreach ($query as $items) {
                $result .= '
                <tr id="' . $items->UsersID . '">
                <td id="UsersUsername' . $items->UsersID . '">' . $items->UsersUsername . '</td>
                <td id="UsersPassword' . $items->UsersID . '">' . $items->UsersPassword . '</td>
                <td id="UsersName' . $items->UsersID . '">' . $items->UsersName . '</td>
                <td id="UsersPhone' . $items->UsersID . '">' . $items->UsersPhone . '</td>
                <td id="UsersAddress' . $items->UsersID . '">' . $items->UsersAddress . '</td>
                <td style="color:red;font-size:25px;" id="UsersActivity' . $items->UsersID . '">' . $items->UsersAuthority . '</td>
                <td>
                <button onclick="UpdateUsers(' . $items->UsersID . ');" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>
                </td>
                <td>
                <a href="javascript:void(0)" onclick="RemoveUsers(\'DeleteUser\',' . $items->UsersID . ')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                </a>
                </td>
                </tr>';
            }
            $result .= ':::' . $records . '';
            echo $result;
        }
        break;

    case 'userUpdate':

        if (isset($_POST["userPhone"])) {
            $UsersID = security('UsersID');
            $passwordUser = security('passwordUser');
            $userPhone = security('userPhone');
            $address =  security('address');
            $UsertActivity =  security('UsertActivity');
            if (empty($passwordUser) or empty($userPhone) or empty($address) or empty($UsertActivity) or $UsertActivity == "0") {
                $result = '<div class="alert alert-warning">Lütfen boş alanları doldurun.</div>:::';
            } else {
                $updateUser = $db->update('UPDATE users SET UsersPassword=?, UsersPhone=?, UsersAddress=?, UsersAuthority=? WHERE UsersID=?
                    ', [$passwordUser, $userPhone, $address, $UsertActivity, $UsersID]);
                if ($updateUser) {
                    $result = '<div class="alert alert-success mt-2 mb-3 text-center" role="alert">
                                               <div style="font-size: 20px;">Kayıt başarı ile güncellendi</div>
                                               </div>:::';
                } else {
                    $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
                                <div style="font-size: 20px;">Aynı verileri giriyorsunuz</div>
                                </div>:::';
                }
            }
            $query = $db->getRows("SELECT * FROM users ORDER BY UsersID DESC");
            $records = $db->getColumn("SELECT COUNT(UsersID) FROM users");
            if ($records < 1) {
                $records = 'Kayıtlı Kullanıcı Yok';
            } else {
                $records = 'Kayıtlı Kullanıcılar - ' . $records . ' adet';
            }
            foreach ($query as $items) {
                $result .= '
                <tr id="' . $items->UsersID . '">
                <td id="UsersUsername' . $items->UsersID . '">' . $items->UsersUsername . '</td>
                <td id="UsersPassword' . $items->UsersID . '">' . $items->UsersPassword . '</td>
                <td id="UsersName' . $items->UsersID . '">' . $items->UsersName . '</td>
                <td id="UsersPhone' . $items->UsersID . '">' . $items->UsersPhone . '</td>
                <td id="UsersAddress' . $items->UsersID . '">' . $items->UsersAddress . '</td>
                <td style="color:red;font-size:25px;" id="UsersActivity' . $items->UsersID . '">' . $items->UsersAuthority . '</td>
                <td>
                <button onclick="UpdateUsers(' . $items->UsersID . ');" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>
                </td>
                <td>
                <a href="javascript:void(0)" onclick="RemoveUsers(\'DeleteUser\',' . $items->UsersID . ')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                </a>
                </td>
                </tr>';
            }
            $result .= ':::' . $records . '';
            echo $result;
        }
        break;


    case 'DeleteUser':
        $ID = $_GET["ID"];
        $isAdmin = $db->getRow("SELECT UsersUsername FROM users WHERE UsersID=?", [$ID]);
        if ($isAdmin->UsersUsername == "admin") {
            $message = "Admin Kullanıcısı Silinemez.:::blabla";
        } else {
            $deleteUser = $db->delete("DELETE FROM users WHERE 	UsersID=?", [$ID]);
            if ($deleteUser) {
                $message = "Kayıt silindi.:::success";
            } else {
                $message = "Kayıt silinemedi.:::danger";
            }
        }

        $records = $db->getColumn("SELECT COUNT(UsersID) FROM users");
        if ($records < 1) {
            $records = 'Kayıtlı Kullanıcı Yok';
        } else {
            $records = 'Kayıtlı Kullanıcılar - ' . $records . ' adet';
        }
        echo $message . ":::" . $records;
        break;

    default:
        break;
}

<?php
    require_once("header.php");
?>
 
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
 
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
            unset($_SESSION["error_messages"]);
        }
 
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
?>
 
 
    <div id="form_auth">
        <h2>Заполните заявку</h2>
        <form action="add_order.php" method="POST" name="add_order">
            <table>
                <tbody>
                    <tr>
                    <td> Вам нужно: </td>
                    <td>
                        <textarea cols="30" rows="5" type="text" name="text_order" required="required"></textarea><br>
                        <span id="valid_text_message" class="mesage_error"></span>
                    </td>
                </tr>
                <tr>
                    <td> Ваш номер: </td>
                    <td>
                        <input type="text" name="phone_number" required="required"><br>
                        <span id="valid_text_message" class="mesage_error"></span>
                    </td>
                </tr>
                <tr>
                    <td> Вы заплатите: </td>
                    <td>
                        <input type="number" min="0" name="price" min="0" required="required"><br>
                        <span id="valid_text_message" class="mesage_error"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_submit_add" value="Отправить">
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
    </div>
 
<?php
    }else{
?>
 
    <div id="authorized">
        <h2>Вы не авторизованы</h2>
    </div>
 
<?php
    }
?>
 
<?php
    require_once("footer.php");
?>
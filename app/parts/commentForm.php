<?php
$position = 0;

if (isset($_POST["submitButton"])) {
  $position = $_POST["position"];
}
?>

<form class="formWrapper" method="POST">
        <div>
          <input type="submit" value="Post" name="submitButton">
          <label>Name :</label>
          <input type="text" name="username" value="<?php if ($thread["id"] == $comment["thread_id"]) echo $_SESSION["username"] ?>">
          <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
        </div>
        <div>
          <textarea class="commentTextArea" name="body"></textarea>
        </div>
        <!-- get position -->
         <input type="hidden" name="position" value="0">
      </form>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(document).ready(() => {
          $("input[type=submit]").click((e) => {
            let position = $(window).scrollTop();
            $("input:hidden[name=position]").val(position);
          })
          $(window).scrollTop(<?php echo $position; ?>);
        })
      </script>
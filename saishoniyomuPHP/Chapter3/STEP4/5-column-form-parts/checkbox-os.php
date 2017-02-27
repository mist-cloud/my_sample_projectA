<?php
if (isset($_GET["os"])) {
  echo "<pre>";
  print_r($_GET["os"]);
} else {
    echo <<< __FORM__
<form>
希望のOSを選択(複数選択可):<br/>
<input type="checkbox" name="os[]" value="linux" id="linux" />
<label for="linux">Linux</label><br/>
<input type="checkbox" name="os[]" value="win" id="win" checked/>
<label for="win">Windows</label><br/>
<input type="checkbox" name="os[]" value="mac" id="mac" checked/>
<label for="mac">Mac OS X</label><br/>

<input type="submit" />
</form>
__FORM__;
}

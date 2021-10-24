<div class="header">
    <div class="logo"><a href="<?php echo ROOT ?>">Ease</a></div>
    <div class="search-box">
        <input type="text">
        <a class="icon-button"><span class="iconify" data-icon="mdi-light:magnify"></span></a>
    </div>
    <div class="nav">
        <a class='<?php echo ($currentPage == PAGE_HOME ? 'selected-header-item' : '') ?>' href="<?php echo ROOT . "/home" ?>">Home</a>
        <a class='<?php echo ($currentPage == PAGE_LOGIN  || $currentPage == PAGE_REGISTER ? 'selected-header-item' : '') ?>' href="<?php echo ROOT ?>">Login</a>
    </div>
</div>
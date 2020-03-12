<div class="media  mt-3" id="com<?php echo $this->id; ?>">
    <img src="http://www.gravatar.com/avatar/<?php echo md5($this->email); ?>?s=32&d=mm&r=G" class="mr-3" alt="...">
    <div class="media-body">
        <div class="post w-100 float-left mb-2">
            <div class="name float-left"><strong><?php echo $this->name; ?></strong></div>
            <div class="date3 float-right small"><?php echo $this->date_add; ?></div>
        </div>
        <?php echo $this->comment; ?>
        <div><a href="#" class="psewdo-link">Ответить</a></div>
        <?php echo $this->reply; ?>
    </div>
</div>
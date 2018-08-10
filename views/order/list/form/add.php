<div id="form-add-wrp">
    <form action="/order/add" method="post">
        <div id="labels-wrp">
            <label>пакет</label>
            <input type="radio" name="type" value="<?=Order::TYPE_PACKET?>" checked="checked">
            <label>стекло</label>
            <input type="radio" name="type" value="<?=Order::TYPE_GLASS?>">
            <br>
            <input type="checkbox" name="note-dwg" value="drawing">
            <label>чертежи</label>
        </div>
        <textarea rows="1" cols="120" name="letter" style="width: 650px"></textarea>
        <input type="submit" value="Добавить">
    </form>
</div>
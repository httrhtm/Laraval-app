/**
 * フォームの追加・削除
 */
$(function(){
    $('tbody').sortable();

    $('#addRow').click(function(){
        var html = '<tr><td class="textbox"><input type="text" name="answer[]"></td><td class="removefield""><button class="remove">削除</button></td></tr>';
        $('tbody').append(html);
    });

    $(document).on('click', '.remove', function() {
        $(this).parents('tr').remove();
    });

    $('#getValues').click(function(){
        var values = [];
        $('input[name="name"]').each(function(i, elem){
            values.push($(elem).val());
        });
        alert(values.join(', '));
    });
});
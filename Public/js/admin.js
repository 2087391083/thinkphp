/**
 * Created by andy on 2016/6/6.
 */

//dom ������ɺ�ִ�е�js
$(function(){
    //��ѡɾ��
    $('td .confirm').click(function(){
        var url = $(this).attr('href');
        layer.confirm('ȷ��Ҫִ��ɾ��������',function(){
            $.ajax({
                type: "GET",
                url: url,
                success: function(message){
                    layer.msg(message,{time:2000},function(){
                        window.location.reload();
                    });
                }
            });
        });
        return false;
    });

    //���ѡ��ȫ��
    $(".check-all").click(function(){
        $(".ids").prop("checked", this.checked);
    });
    //ѡ����
    $(".ids").click(function(){
        var option = $(".ids");
        option.each(function(i){
            if(!this.checked){
                $(".check-all").prop("checked", false);
                return false;
            }else{
                $(".check-all").prop("checked", true);
            }
        });
    });

    //ȫѡɾ��
    $('.delete-all').click(function(){
        var ids = $('.ids:checked');
        if(ids.length == 0){
            layer.msg('��ѡ��Ҫɾ����ѡ��',{time:1000});
            return false;
        }
        var url = $(this).attr('url');
        layer.confirm('ȷ��Ҫִ��ɾ��������',function(){
            var query = ids.serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: query,
                success: function(message){
                    layer.msg(message,{time:1000},function(){
                        window.location.reload();
                    });
                }
            });
        });
        return false;
    });





});

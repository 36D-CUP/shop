/*
  作用：
    单击修改状态

  用法:
    在对应的a标签上加入
      thisID='这里放id'
      clickStatus='放入1或2'
      clickStatusKey='放入字段名'
      clickRes = 操作路径;
      加入一个click_updata_status类
      例如：
      <a href="#" class = "click_updata_status btn {if condition='($rows.status==1)'}btn-success{else}btn-primary{/if} btn-sm" clickStatusKey ='status' thisID = "{$rows['id']}" clickTable = 'my_admin'  clickRes = '/admin/click_updata_status' clickStatus="{$rows['status']}" style ='color:#fff'>
          {if condition="($rows['status']==1)"}
            启用
          {else}
            禁用
          {/if}
            </a>
*/


$('body').on('click','.click_updata_status',function(e){
  var thiss   = $(this);
  var id      = $(this).attr('thisID');                          //获取要修改的数据ID
  var val     = $(this).attr('clickStatus');                     //获取当前的状态值
  var key     = $(this).attr('clickStatusKey');                  //默认status字段，如不是,请复制clickStatusKey
  var table   = $(this).attr('clickTable');                      //数据库名
  var address = $(this).attr('clickRes');                        //修改地址
  var q       = $(this).attr('clickq');                          //好的状态
  var j       = $(this).attr('clickj');                          //坏的状态
    if(q==undefined){
      q = '启用';
      j = '禁用';
    }
  val = val=="1"?"2":"1";
  $.post(address,{id:id,val:val,key:key,table:table},function(data){
    name = data==1?q:j;
    if(data=='shibai'){
      alert('你没有此权限,请联系管理员');
      location.reload();
    }else if(val==1){
      thiss.removeClass("btn-primary");
      thiss.addClass("btn-success");
      thiss.attr('clickStatus',data);
      thiss.html(name);
    }else if(data.msg=="没有权限"){
      alert('此功能没有权限,请联系管理员');
      // location.reload();
    }else{
      thiss.removeClass("btn-success");
      thiss.addClass("btn-primary");
      thiss.attr('clickStatus',data);
      thiss.html(name);
    }
  });
});



/*
  作用：
    单击删除

  用法:
    在对应的a标签上加入
      thisID='这里放id'
      clickTable='放关联的表'
      clickRes = 操作路径;
      加入一个click_delete类
      例如：
      <a href="javascript:;" class = 'btn btn-warning btn-sm click_delete' thisID="{$rows['id']}" clickRes = '/admin/Click_delete' clickTable = 'my_admin'>删除</a>
*/
$('body').on('click','.click_delete',function(e){
  if(confirm('确定删除吗?')){
    var id      = $(this).attr('thisID');                   //获取要修改的数据ID
    var table   = $(this).attr('clickTable');               //获取关联的表,到时候改
    var address = $(this).attr('clickRes');                 //修改地址

    $.post(address,{id:id,table:table},function(data){
      if(data=='shibai'){
        alert('你没有此权限,请联系管理员');
        location.reload();
      }else if(data=='1'){
        alert('删除成功');
        location.reload();
      }else if(data.msg=="没有权限"){
      alert('此功能没有权限,请联系管理员');
      // location.reload();
    }else{
        alert('删除失败');
        // location.reload();
      }
    });
  }
});





/*
  作用：
    双击修改，只限于文本，标准可套用格式<td>内容</td>,不一定适用td标签
  用法:
    在对应的td标签上加入
      thisID='这里放id'
      clickRes = 操作路径;
      dblName='这里放字段名'
      thisTable = '这里放表名'
      加入一个double_updata_txt类
      例如：<a href="javascript:;" class = 'btn btn-warning btn-sm click_delete' thisID="{$rows['id']}" clickRes = '/admin/Click_delete' clickTable = 'my_admin'>删除</a>
*/
$('body').on('dblclick','.double_updata_txt',function(a){
  var id      = $(this).attr('thisID');                            //获取要修改的数据ID
  var txt     = $(this).html();                                    //获取当前的文本内容
  var name    = $(this).attr('tableName');                           //获取当前在数据库里面的字段名
  var table   = $(this).attr('clickTable');                        //获取当前在数据库里面的字段名
  var address = $(this).attr('clickRes');                       //修改地址
  console.log(id);
  console.log(txt);
  console.log(name);
  console.log(table);
  console.log(address);
  if(txt.match(/input/)){
        return ;                                                //防止重复双击造成的bug
    }

  $(this).html("");                                             //文本清空
  var inputs = $("<input value = '"+txt+"' type = 'text'>");    //新建一个input标签,value值为原本的文本值
  $(this).append(inputs);                                       //让td追加input标签
  inputs.focus();                                               //获取焦点

  //失去焦点时候
  $(inputs).blur(function(){
    if(confirm("你确定修改吗?")){
      var new_txt = $(this).val();                          //获取当前修改后的value值

      $.post(address,{id:id,name:name,new_txt:new_txt,table:table},function(data){
        if(data=='shibai'){
          alert('你没有此权限,请联系管理员');
          location.reload();
        }
      });

      $(this).parent().html($(this).val());                 //通过ajax返回的结果重新赋值给td
    }else{
      $(this).parent().html(txt);                           //当对话宽为false时,将文本值恢复
    }
  });
});  

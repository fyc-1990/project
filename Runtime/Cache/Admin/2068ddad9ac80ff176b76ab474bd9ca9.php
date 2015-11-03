<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="x-ua-compatible"/>
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>admin/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>font-awesome.css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo JS_PATH ?>DD_belatedPNG.js" ></script>
<script type="text/javascript">
DD_belatedPNG.fix('*');
</script>
<![endif]-->
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH;?>Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>Validform_Datatype.js"></script>


<script type="text/javascript" src="<?php echo JS_PATH;?>artDialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>artDialog/plugins/iframeTools.js" ></script>
<script type="text/javascript">
(function(config) {
	config['lock'] = true;
	config['fixed'] = true;
})(art.dialog.defaults);
</script>

<script type="text/javascript" src="<?php echo JS_PATH;?>common.js"></script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>EasyUI/themes/lhave/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>EasyUI/themes/icon.css">
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>EasyUI/hd_default_config.js"></script>
<div class="content">
	<div class="site"><a href="#">数据管理</a> > 备份数据</div>
	<span class="line_white"></span>
	<div class="goods mt10">
		<div class="guanli">
			<form action="<?php echo U('Data/backup'); ?>" method='post'>
				<!--<span style="margin-right: 10px;">按等级查看</span>-->
<!--				<select name='description' id='group_combbox' class="easyui-combobox" data-options="editable:false,panelHeight:'auto'" style="height: 26px;"></select>-->
				<span style="margin-right: 10px;margin-left: 10px;">搜索</span>
				<input id="keyword" class="easyui-textbox" name="keyword" style="width:210px;height: 26px;" prompt="输入会员名/手机/邮箱/均可搜索">
				<a id="search"href="#" class="easyui-linkbutton" style="height: 26px;padding-right: 10px;">查询</a>
			</form>
		</div>
		<div class="login mt10" style="border: none;">
			<table id="member_list" style="width:100%"></table>
			<div class="clear"></div>
		</div>
		<div class="copy"><span class="line_white"></span>  版权所有 © 2013-2015 <?php echo C('site_company');?>，并保留所有权利。</div>
</body>
</html>
		<div class="clear"></div>
    </div>
    
	
	
<script type="text/javascript">
	var dom = $('#member_list');
	var pageSize = <?php echo PAGE_SIZE?>;
	var dataurl = '<?php echo U('backup')?>';
    var backurl = '<?php echo U('dobackup')?>';
    var yhurl = '<?php echo U('yh')?>';
    var xfurl = '<?php echo U('xf')?>';
	$(function(){
		dom.datagrid({
			url:dataurl,
			striped:true,
			width:'100%',
			fitColumns:true,
			checkOnSelect:true,
			toolbar:[{
					id:'backup',
					text:'备份',
					iconCls:'icon-del',
				},'-',
				
				{
					id:'youhua',
					text:'优化',
					iconCls:'icon-del',
				},'-',
				{
					id:'xiufu',
					text:'修复',
					iconCls:'icon-del',
				},'-',
			],
			frozenColumns:[[
				{field:'table_name',checkbox:true}
			]],
//			pagination:true,
//			pageSize:pageSize,
//			pageList: [pageSize,pageSize*2,pageSize*4],//可以设置每页记录条数的列表
			columns:[[
				{field:'name',title:'表名',fixed:true,align:'center',width:'20%'},
			
				{field:'engine',title:'引擎类型',fixed:true,width:'20%',align:'center'},
				{field:'rows',title:'记录行数',fixed:true,width:'10%',align:'center'},
				{field:'collation',title:'字符集',fixed:true,width:'10%',align:'center'},
				{field:'size',title:'表大小',fixed:true,width:'10%',align:'center'},
				{field:'userID',title:'操作',width:'30%',align:'center',halign:'center',
					formatter:function(value,row,index){
						var sp_txt="&nbsp;&nbsp;&nbsp;&nbsp;";
							return '<a onclick="dom.datagrid(\'clearSelections\').datagrid(\'clearChecked\').datagrid(\'checkRow\','+index+');$(\'#backup\').trigger(\'click\')" href="#">备份</a>'+sp_txt+
							'<a onclick="dom.datagrid(\'clearSelections\').datagrid(\'clearChecked\').datagrid(\'checkRow\','+index+');$(\'#youhua\').trigger(\'click\')" href="#">优化</a>'+sp_txt+
							'<a onclick="dom.datagrid(\'clearSelections\').datagrid(\'clearChecked\').datagrid(\'checkRow\','+index+');$(\'#xiufu\').trigger(\'click\')" href="#">修复</a>';
						}
				},
			]],
//			onLoadSuccess:function(data){
//				var group = data.rows;
//				group.unshift({"description":"请选择"})
//				$('#group_combbox').combobox({
//					data:group,
//					valueField:'description',
//					textField:'description'
//				});
//			}
		});
		//回车查询
		$('#keyword').textbox('textbox').bind('keydown',function (e) {
			if (e.keyCode == 13) {
				$('#search').trigger('click');
			}
		});
		//增加查询参数，重新加载表格
		$('#search').bind('click',function (){
				var queryParams = dom.datagrid('options').queryParams;
		//查询参数直接添加在queryParams中
			queryParams.keyword = $("#keyword").val();
//			queryParams.description = $('#group_combbox').combobox('getValue');
			dom.datagrid('options').queryParams = queryParams;
			dom.datagrid('reload');
		})
		//优化
		$('#youhua').bind('click',function(){
			var tables = [];
			var rows = dom.datagrid('getChecked');
			
			for(var i=0; i<rows.length; i++){
				tables.push(rows[i].table_name);
			}
			
			if (tables.length > 0){
				$.messager.confirm('确认','您确认想要优化数据么？',function(r){
					if (r){
						$.post(yhurl,
						{"table[]":tables},
						function(data){
							if(data.status == 1){
//								window.location.href = data.url;
                                $.messager.alert('提示',data.info);
								dom.datagrid("reload");  //重新加载
							}else{
								$.messager.alert('警告',data.info);
							}
						},'json')
					}else{
						dom.datagrid('clearSelections').datagrid('clearChecked');
					}
				});
			}else{
				$.messager.alert('警告','请选择要优化的记录');
				return false;
			}
		});
		//修复
		$('#xiufu').bind('click',function(){
			var tables = [];
			var rows = dom.datagrid('getChecked');
			
			for(var i=0; i<rows.length; i++){
				tables.push(rows[i].table_name);
			}
			
			if (tables.length > 0){
				$.messager.confirm('确认','您确认想要修复数据么？',function(r){
					if (r){
						$.post(xfurl,
						{"table[]":tables},
						function(data){
							if(data.status == 1){
//								window.location.href = data.url;
                                $.messager.alert('提示',data.info);
								dom.datagrid("reload");  //重新加载
							}else{
								$.messager.alert('警告',data.info);
							}
						},'json')
					}else{
						dom.datagrid('clearSelections').datagrid('clearChecked');
					}
				});
			}else{
				$.messager.alert('警告','请选择要修复的记录');
				return false;
			}
		});
		//备份
		$('#backup').bind('click', function(){
			var tables = [];
			var rows = dom.datagrid('getChecked');
			
			for(var i=0; i<rows.length; i++){
				tables.push(rows[i].table_name);
			}
			
		
			if (tables.length > 0){
				$.messager.confirm('确认','您确认想要备份数据么？',function(r){
					if (r){
						$.post(backurl,
						{"table[]":tables},
						function(data){
							if(data.status == 1){
//								window.location.href = data.url;
								dom.datagrid("reload");  //重新加载
							}else{
								$.messager.alert('警告',data.info);
							}
						},'json')
					}else{
						dom.datagrid('clearSelections').datagrid('clearChecked');
					}
				});
			}else{
				$.messager.alert('警告','请选择要备份的记录');
				return false;
			}
		});
	});
</script>
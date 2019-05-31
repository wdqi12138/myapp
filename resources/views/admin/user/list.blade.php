@extends('common/admins')


@section('title',$title)

@section('content')
<div class="row-fluid">  
    <div class="span12">

@if(session('success'))
<div class="alert alert-info" id="wang">
    {{session('success')}}
</div>
@endif


<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box light-grey">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-globe">
            </i>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    {{$title}}
                </font>
            </font>
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="#portlet-config" data-toggle="modal" class="config"></a>
            <a href="javascript:;" class="reload"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <div class="row-fluid">
                <div class="span6">

                    <form action="/admin/user" method='get'>
                        <div id="DataTables_Table_1_length" class="dataTables_length">
                            <label>
                                显示
                                <select size="1" name="num" aria-controls="DataTables_Table_1">
                                    <option value="10" @if($request->num == '10') selected="selected" @endif >
                                        10
                                    </option>
                                    <option value="20" @if($request->num == '20') selected="selected" @endif>
                                        20
                                    </option>
                                    <option value="30" @if($request->num == '30') selected="selected" @endif>
                                        30
                                    </option>
                                    
                                </select>
                                条数据
                            </label>
                        </div>
                   

                </div>
                <div class="span6">
                    <div class="dataTables_filter" id="sample_1_filter">
                        <label>
                            邮箱:
                            <input type="text" name='email' aria-controls="DataTables_Table_1" value="{{$request->email}}">
                        </label>
                        <label>
                            用户名:
                            <input type="text" name='username' aria-controls="DataTables_Table_1" value="{{$request->username}}">
                        </label>
                        <button type="submit" class="btn">搜索</button>
                    </div>
                </div>
            </div>
         </form>
            <table class="table table-striped table-bordered table-hover dataTable"
            id="sample_1" aria-describedby="sample_1_info">
                <thead>
                    <tr role="row">
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    ID
                                </font>
                            </font>
                        </th>
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    用户名
                                </font>
                            </font>
                        </th>
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 150px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    邮箱
                                </font>
                            </font>
                        </th>
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    手机号
                                </font>
                            </font>
                        </th>
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    头像
                                </font>
                            </font>
                        </th>
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    状态
                                </font>
                            </font>
                        </th>
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: ;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    操作
                                </font>
                            </font>
                        </th>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($rs as $k => $v)
                    @if($k % 2 == 0)
                    <tr class="gradeX odd">
                    @else
                    <tr class="gradeX even">
                    @endif
                        <td class="center hidden-480 ">
                            {{$v->id}}
                        </td>
                        <td class="center hidden-480 ">
                            {{$v->username}}
                        </td>
                        <td class="center hidden-480 ">
                            {{$v->email}}
                        </td>
                        <td class="center hidden-480 ">
                            {{$v->phone}}
                        </td>
                        <td class="center hidden-480 ">
                            <img src="{{$v->profile}}">
                            
                        </td>
                        <td class="center hidden-480 ">
                            
                            {{--@if($v->status == 1)
                                开启
                            @else
                                禁用
                            @endif
                            --}}

                            <!-- 自定义函数 -->
                            {{getUsersta($v->status)}}                       
                        </td>
                        <td class="">                           
                            <a class='btn purple' href="/admin/userrole?uid={{$v->id}}">角色</a>

                            <a class='btn wine red' href="/admin/user/{{$v->id}}/edit">修改</a>
                            <form action="/admin/user/{{$v->id}}" method='post' style='display: inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class='btn blue'>删除</button>
                            </form>
                        </td>   
                    

                    </tr>
                @endforeach
                   
                    
                </tbody>
            </table>
            <div class="row-fluid">
                <div class="span6">
                    <div class="dataTables_info" id="sample_1_info">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                 本页显示{{$rs->count()}}条数据   共是{{$rs->total()}}条数据
                            </font>
                        </font>
                    </div>
                </div>
                <div class="span6">
                    <div class="dataTables_paginate paging_bootstrap pagination">
                        <ul>
                            {{$rs->appends($request->all())->links()}}
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>


@stop


@section('js')
  <script>
      
    setTimeout(function(){

        $('#wang').hide(1200)
    },2000)  
  </script>
 


@stop
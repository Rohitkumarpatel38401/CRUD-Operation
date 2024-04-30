<?php
    include("db_model.php");
    $obj=new Database();


    if( isset($_REQUEST['act']) ){
        
        if($_REQUEST['act']=='insert'){
            $arr=array('u_name'=>$_REQUEST['name'],'u_fname'=>$_REQUEST['fname'],'u_address'=>$_REQUEST['address']);
            if( $obj->insert('users',$arr) ){
                header('location:index.php?msg=Record Added Success !!');
            }
        }

        if($_REQUEST['act']=='delete'){
            if($obj->delete('users',' u_id='.$_REQUEST['id'])){
                header('location:index.php?msg=Record Deleted !!');
            }
        }
        
        if($_REQUEST['act']=='update'){
            $arr=array('u_name'=>$_REQUEST['name'],'u_fname'=>$_REQUEST['fname'],'u_address'=>$_REQUEST['address']);
            $condition="u_id=".$_REQUEST['id'];
            if(  $obj->update('users',$arr,$condition) ){
                header('location:index.php?msg=Record Updated Success!!');
            } 
        }

    }
   
?>
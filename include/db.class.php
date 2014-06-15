<?php
/*
*数据库类
*/
abstract class Db {

	/*
	*连接服务器
	*params $h 服务器地址
	*params $u 用户名
	*params $p 密码
	*return bool
	*/
	public abstract function connect($h,$u,$p);

	/*
	*发送查询
	*params $sql sql语句
	*return mixed bool/resource
	*/
	public abstract function query($sql);

	/*
	*查询多行数据
	*params $sql select型语句
	*return array/bool
	*/
	public abstract function getAll($sql);

	/*
	*查询单行数据
	*params $sql select型语句
	*return array/bool
	*/
	public abstract function getRow($sql);


	/*
	*查询单个数据
	*params $sql select型语句
	*return array/bool
	*/
	public abstract function getOne($sql);

	/*
	*自动执行语句
	*params 
	*/
	public abstract function autoExecute($table,$data,$act='insert',$where='');


}
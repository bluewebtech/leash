<?php

//dump( BandsModel::all( array( 'order' => 'band', 'sort' => 'asc' ) ) );
//dump( BandsModel::all( 'band', 'desc' ) );
//dump( BandsModel::find( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::find( 'id', 11 ) );
//dump( BandsModel::eq( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::eq( 'id', 15 ) );
//dump( BandsModel::neq( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::neq( 'id', 15 ) );
//dump( BandsModel::lt( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::lt( 'id', 15 ) );
//dump( BandsModel::lte( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::lte( 'id', 15 ) );
//dump( BandsModel::gt( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::gt( 'id', 15 ) );
//dump( BandsModel::gte( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::gte( 'id', 15 ) );
//dump( BandsModel::where( 'id', '=', 15 ) );

/*
$date = date( 'Y-m-d' );
$columns = array( 'date_created', 'band' );
BandsModel::save( $columns, array( $date, 'Danzig' ) );
BandsModel::save( $columns, array( $date, 'Powerman 5000' ) );
BandsModel::save( $columns, array( $date, 'Green Jelly' ) );
BandsModel::save( $columns, array( $date, 'Spinal Tap' ) );
dump( BandsModel::all( 'id', 'desc' ) );
*/

/*
$date = date( 'Y-m-d' );
$columns = array( 'date_updated', 'band', 'id' );
$band = BandsModel::edit( $columns, array( $date, 'Morbid Angel', 36 ) );
dump( BandsModel::all( 'id', 'desc' ) );
*/

/*
$date = date( 'Y-m-d' );
$columns = array( 'date_updated', 'band', 'id' );
$band = BandsModel::update( $columns, array( $date, 'Morbid Angel', 36 ) );
dump( BandsModel::all( 'id', 'desc' ) );
*/

/*
$band = BandsModel::delete( 'id', 43 );
dump( BandsModel::all( 'id', 'desc' ) );

$band = BandsModel::del( 'id', 42 );
dump( BandsModel::all( 'id', 'desc' ) );
*/

//dump( BandsModel::hunt( 'id', 11 ) );
//$band = BandsModel::obliterate( 'id', 14 );
//dump( BandsModel::werewolf( 'id', '!=', 14 ) );

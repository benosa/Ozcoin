<?php
//    Copyright (C) 2011  Mike Allison <dj.mikeallison@gmail.com>
//
//    This program is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.

// 	  BTC Donations: 163Pv9cUDJTNUbadV4HMRQSSj3ipwLURRc

include ("includes/header.php");

$bitcoinController = new BitcoinClient($rpcType, $rpcUsername, $rpcPassword, $rpcHost);

$blockExistsQ = mysql_query("SELECT id,accountAddress FROM networkBlocks WHERE confirms > 1")or die(mysql_error());
while ($blockExists = mysql_fetch_object($blockExistsQ)) {

$transactions1 = $bitcoinController->query("gettransaction" ,"$blockExists->accountAddress");

$blockid = $blockExists->id;
$confirms = $transactions1['confirmations'];
print("Confirms: $confirms <br>");
print("Block ID: $blockid <br><br>");

//mysql_query("UPDATE networkBlocks SET confirms = '".$confirms."' WHERE id = ".$blockid);
}



include("includes/footer.php");			

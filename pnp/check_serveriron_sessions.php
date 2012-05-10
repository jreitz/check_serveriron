<?php

#
#   PNP Template for check_serveriron_sessions
#   Author: Jay Reitz
#
#   TODO: handle variable number of slots
#


$ds_name[1] = "ServerIron BP session utilization";
$opt[1] = "--vertical-label \"% used\" -l 0 --title \"Requests per second $hostname / $servicedesc\" ";

$def[1]  =  "DEF:utilization=$rrdfile:$DS[1]:AVERAGE " ;

$def[1] .= "COMMENT:\"\\n\" " ;
$def[1] .= "LINE:utilization#000000:\"Sessions used \\t\\t\" " ;
$def[1] .= "GPRINT:utilization:LAST:\"%6.2lf $UNIT[1] last \" " ;
$def[1] .= "GPRINT:utilization:MAX:\"%6.2lf $UNIT[1] max \" " ;
$def[1] .= "GPRINT:utilization:AVERAGE:\"%6.2lf $UNIT[1] avg \\n\" " ;

##
# session counts

$opt[2] = "--vertical-label \"sessions used\" -l 0 --title \"BP sessions by slot $hostname / $servicedesc\" ";
$ds_name[2] = "ServerIron BP sessions by slot";

$def[2]  =  "DEF:slot1=$rrdfile:$DS[2]:AVERAGE " ;
$def[2] .=  "DEF:slot2=$rrdfile:$DS[3]:AVERAGE " ;

$def[2] .= "AREA:slot1#FFC857:\"BP 1\\t\\t\":STACK " ;

$def[2] .= "GPRINT:slot1:LAST:\"%7.0lf $UNIT[2] last \" " ;
$def[2] .= "GPRINT:slot1:MAX:\"%7.0lf $UNIT[2] max \" " ;
$def[2] .= "GPRINT:slot1:AVERAGE:\"%7.1lf $UNIT[2] avg \\n\" " ;

$def[2] .= "AREA:slot2#FFB00F:\"BP 2\\t\\t\":STACK " ;

$def[2] .= "GPRINT:slot2:LAST:\"%7.0lf $UNIT[3] last \" " ;
$def[2] .= "GPRINT:slot2:MAX:\"%7.0lf $UNIT[3] max \" " ;
$def[2] .= "GPRINT:slot2:AVERAGE:\"%7.1lf $UNIT[3] avg \\n\" " ;

?>

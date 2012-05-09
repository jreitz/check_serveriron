<?php

#
#   PNP Template for check_serveriron_cpu
#   Author: Jay Reitz
#
#   TODO: detect and handle multiple barrel processors
#

$ds_name[1] = "ServerIron processor utilization";
$opt[1] = "--vertical-label \"% used\" -l 0 --title \"Requests per second $hostname / $servicedesc\" ";

$def[1]  =  "DEF:management=$rrdfile:$DS[1]:AVERAGE " ;
$def[1]  .=  "DEF:bp1=$rrdfile:$DS[2]:AVERAGE " ;

$def[1] .= "COMMENT:\"\\n\" " ;
$def[1] .= "LINE:management#000000:\"Management \\t\\t\" " ;
$def[1] .= "GPRINT:management:LAST:\"%6.2lf $UNIT[1] last \" " ;
$def[1] .= "GPRINT:management:MAX:\"%6.2lf $UNIT[1] max \" " ;
$def[1] .= "GPRINT:management:AVERAGE:\"%6.2lf $UNIT[1] avg \\n\" " ;

$def[1] .= "LINE:bp1#FF4500:\"BP 1\\t\\t\\t\" " ;
$def[1] .= "GPRINT:bp1:LAST:\"%6.2lf $UNIT[1] last \" " ;
$def[1] .= "GPRINT:bp1:MAX:\"%6.2lf $UNIT[1] max \" " ;
$def[1] .= "GPRINT:bp1:AVERAGE:\"%6.2lf $UNIT[1] avg \\n\" " ;

?>

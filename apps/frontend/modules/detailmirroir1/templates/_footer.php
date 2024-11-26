 <td><?php 
	  $elements = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.id, count(a.id) as id')
						->from('RdDetailMirroir a')
						->groupBy('a.id')
						// ->where('a.id=1')
 						->execute();
	  foreach ($elements as $raishaut)
  {
   	 //echo $var =$productPhoto->getPrice();
    	  
 	$elements =$raishaut->getId(); 


	} 
?> <ul>
	  <li><i class="icon-ok"></i>&nbsp;&nbsp;<?php echo $elements*4;?> Rouletttes</li> <br/>
	  <li><i class="icon-ok"></i>&nbsp;&nbsp;<?php echo $elements*2;?> Serrures </li> <br/>
	  <li><i class="icon-ok"></i>&nbsp;&nbsp;<?php echo $grandtotal;//$elements*1;?> metres de Joint de vitrage</li> <br/>
	  
	  </ul></td>
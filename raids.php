<?
	include ( ' init.php ' );
	$ page_title  =  ' Tous les raids ' ;
	$ nav  =  ' raids ' ;
	include ( ' head.txt ' );
? >

< largeur de la table  = " 100% " >
	< tr >
		< th > Raid </ th >
		< th > Durée </ th >
		< th > Démarrer </ th >
		< th > Fin </ th >
		< th > Patrons tués </ th >
		< th > Objets volés </ th >
		< th > Raiders </ th >
	</ tr >

<?
	$ result  = db_query ( " SELECT  *  FROM raids ORDER BY date_start DESC " );
	while ( $ row  = db_fetch_hash ( $ result )) {
		list ( $ bosses ) = db_fetch_list (db_query ( " SELECT  COUNT ( * ) FROM bosses WHERE raid_id = $ row [ id ] " ));
		Liste ( loots $ ) = db_fetch_list (db_query ( " SELECT  COUNT ( * ) DE loots OU raid_id = $ row [ id ] " ));
		list ( $ players ) = db_fetch_list (db_query ( " SELECT  COUNT ( * ) FROM présence WHERE raid_id = $ row [ id ] " ));
? >
	< tr >
		< Td > < a  href = " raid.php? Id = <? = $ Row [ id ] ? > " > <? = $ Row [ jour ] ? > - <? = format_zone ( $ rangée [ zone ], $ rangée [ difficulté ]) ? > </ a > </ td >
		< td > <? = format_period ( $ row [ date_end ] -  $ row [ date_start ], 1 ) ? > </ td >
		< td > <? = format_time_only ( $ row [ date_start ]) ? > </ td >
		< td > <? = format_time_only ( $ row [ date_end ]) ? > </ td >
		< td  style = " text-align : center " > <? = $ bosses ? > </ td >
		< td  style = " text-align : center " > <? = $ pille ? > </ td >
		< td  style = " text-align : center " > <? = $ players ? > </ td >
	</ tr >
<?
	}
? >
</ table >


<?
	include ( ' foot.txt ' );
? >

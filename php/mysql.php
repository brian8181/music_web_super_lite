<?php
      /**
       * Enter description here...
       *
       */
      class mysql_db
      {
        /**
         * Enter description here...
         *
         * @param unknown_type $sqlserver
         * @param unknown_type $sqluser
         * @param unknown_type $sqlpassword
         * @param unknown_type $database
         * @return unknown
         */
        function sql_connect($sqlserver, $sqluser, $sqlpassword, $database)
        {
            $this->connect_id = mysql_connect($sqlserver, $sqluser, $sqlpassword);
            if($this->connect_id)
            {
            	if (mysql_select_db($database)){
              		$this->query("SET NAMES 'utf8'");
                    return $this->connect_id;
                }
				else {
                    return $this->error();
                }
            	
            }
            else 
            {
                return $this->error();
            }
        }

        /**
         * Enter description here...
         *
         */
        function error(){
            if(mysql_error() != ''){
                echo '<b>MySQL Error</b>: '.mysql_error().'<br/>';
            }
        }

        /**
         * Enter description here...
         *
         * @param unknown_type $query
         * @return unknown
         */
        function query($query){
            if ($query != NULL){
                $this->query_result = mysql_query($query, $this->connect_id);
                if(!$this->query_result){
                    return $this->error();
                }else{
                    return $this->query_result;
                }
            }else{
                return '<b>MySQL Error</b>: Empty Query!';
            }
        }

        /**
         * Enter description here...
         *
         * @param unknown_type $query_id
         * @return unknown
         */
        function get_num_rows($query_id = ""){
            if($query_id == NULL){
                $return = mysql_num_rows($this->query_result);
            }else{
                $return = mysql_num_rows($query_id);
            }
            if(!$return){
                $this->error();
            }else{
                return $return;
            }
        }

        /**
         * Enter description here...
         *
         * @param unknown_type $query_id
         * @return unknown
         */
        function fetch_row($query_id = ""){
            if($query_id == NULL){
                $return = mysql_fetch_array($this->query_result);
            }else{
                $return = mysql_fetch_array($query_id);
            }
            if(!$return){
                $this->error();
            }else{
                return $return;
            }
        }   

        /**
         * Enter description here...
         *
         * @param unknown_type $query_id
         * @return unknown
         */
        function get_affected_rows($query_id = ""){
            if($query_id == NULL){
                $return = mysql_affected_rows($this->query_result);
            }else{
                $return = mysql_affected_rows($query_id);
            }
            if(!$return){
                $this->error();
            }else{
                return $return;
            }
        }

        /**
         * Enter description here...
         *
         * @return unknown
         */
        function sql_close(){
            if($this->connect_id){
                return mysql_close($this->connect_id);
            }
        }
    }
?>
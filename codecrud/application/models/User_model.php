<?php 
   class User_model extends CI_Model {

         // login 
         public function can_login($username,$password)
         {
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $query = $this->db->get('user');
            
            if($query->num_rows() > 0){ return true; }
            else{ return false; }
         }

         // to add data in database
   		public function add($data){
   			$result = $this->db->insert("user",$data);
            // if($result == 1){
            //    echo "<script>alert('Record Inserted')</script>";
            // }
            // else{
            //    echo "<script>alert('Record Not Inserted')</script>";
            // }
   		}

         // to display all data from databse
         public function list_all_data()
         {
            $this->db->select("*");
            $query = $this->db->get("user");  
            return $query;
         }

         //to delete single user
         public function delete_single_user($id)
         {
            return $this->db->delete('user',array('id'=>$id));
         }

         // to edit single user data
         public function edit_single_data($id)
         {
            $this->db->where('id',$id);
            $query = $this->db->get('user');
            return $query;
         }

         // to update single data using where condition
         public function update_data($data,$id)
         {
            $this->db->where('id',$id);
            $this->db->update('user',$data);
         }

         public function search_user($keyword)
         {
            $query=$this->db->query("SELECT * FROM user WHERE username LIKE '%$keyword%' OR email LIKE '%$keyword%'");
                     
            return $query->result();
         }
   }
?>
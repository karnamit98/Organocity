<?php

    date_default_timezone_set('Indian/Chagos');
    //include 'includes/dbconnection.inc.php';
    class SLOT extends DB{

        public $slot1;  
        public $slot2;
        public $slot3; 
        public $slot4; 
        public $slot5; 
        public $slot6; 
        public $slot7; 
        public $slot8; 
        public $slot9; 

        function __construct()
        {
            //Get Current Hour Time on 0 to 23 format
            $time = date("G");

            //If today is Wednesday
            if(date("w") == 3)
            {
                if($time < 10)                    //If accessed before 10
                {   
                    $this->slot1 = 3;             //Next Week Slot 
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 2;             //This Week Slot
                    $this->slot5 = 2;             //This Week Slot
                    $this->slot6 = 2;             //This Week Slot
                    $this->slot7 = 2;             //This Week Slot
                    $this->slot8 = 2;             //This Week Slot
                    $this->slot9 = 2;             //This Week Slot
                }
                else if($time >= 10 && $time < 13) //If accessed between 10 and 13
                {
                    $this->slot1 = 3;             //Next Week Slot
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 1;             //Slot Disabled
                    $this->slot5 = 2;             //This Week Slot
                    $this->slot6 = 2;             //This Week Slot
                    $this->slot7 = 2;             //This Week Slot
                    $this->slot8 = 2;             //This Week Slot
                    $this->slot9 = 2;             //This Week Slot
                }
                else if($time >= 13 && $time < 16) //If accessed between 13 and 16
                {
                    $this->slot1 = 3;             //Next Week Slot 
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 1;             //Slot Disabled
                    $this->slot5 = 1;             //Slot Disabled
                    $this->slot6 = 2;             //This Week Slot
                    $this->slot7 = 2;             //This Week Slot
                    $this->slot8 = 2;             //This Week Slot
                    $this->slot9 = 2;             //This Week Slot
                }
                else if($time >= 16 && $time < 19) //If accessed between 16 and 19
                {
                    $this->slot1 = 3;             //Next Week Slot 
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 3;             //This Week Slot
                    $this->slot5 = 3;             //This Week Slot
                    $this->slot6 = 3;             //This Week Slot
                    $this->slot7 = 2;             //This Week Slot
                    $this->slot8 = 2;             //This Week Slot
                    $this->slot9 = 2;             //This Week Slot
                }
                else                              //If accessed after 19
                {
                    $this->slot1 = 3;             //Next Week Slot 
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 3;             //Next Week Slot
                    $this->slot5 = 3;             //Next Week Slot
                    $this->slot6 = 3;             //Next Week Slot
                    $this->slot7 = 2;             //This Week Slot
                    $this->slot8 = 2;             //This Week Slot
                    $this->slot9 = 2;             //This Week Slot
                }
            }
            
            //If today is Thrusday
            else if(date("w") == 4)
            {
                if($time < 10)                    //If accessed before 10
                {   
                    $this->slot1 = 3;             //Next Week Slot 
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 3;             //Next Week Slot
                    $this->slot5 = 3;             //Next Week Slot
                    $this->slot6 = 3;             //Next Week Slot
                    $this->slot7 = 2;             //This Week Slot
                    $this->slot8 = 2;             //This Week Slot
                    $this->slot9 = 2;             //This Week Slot
                }
                else if($time >= 10 && $time < 13) //If accessed between 10 and 13
                {
                    $this->slot1 = 3;             //Next Week Slot
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 1;             //Slot Disabled
                    $this->slot5 = 3;             //Next Week Slot
                    $this->slot6 = 3;             //Next Week Slot
                    $this->slot7 = 1;             //Slot Disabled
                    $this->slot8 = 2;             //This Week Slot
                    $this->slot9 = 2;             //This Week Slot
                }
                else if($time >= 13 && $time < 16) //If accessed between 13 and 16
                {
                    $this->slot1 = 3;             //Slot Disabled
                    $this->slot2 = 3;             //Slot Disabled
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 3;             //Next Week Slot
                    $this->slot5 = 3;             //Next Week Slot
                    $this->slot6 = 3;             //Next Week Slot
                    $this->slot7 = 1;             //Slot Disabled
                    $this->slot8 = 1;             //Slot Disabled
                    $this->slot9 = 2;             //This Week Slot
                }
                else if($time >= 16 && $time < 19) //If accessed between 16 and 19
                {
                    $this->slot1 = 3;             //Next Week Slot 
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 3;             //Next Week Slot
                    $this->slot5 = 3;             //Next Week Slot
                    $this->slot6 = 3;             //Next Week Slot
                    $this->slot7 = 3;             //Next Week Slot
                    $this->slot8 = 3;             //Next Week Slot
                    $this->slot9 = 3;             //Next Week Slot
                }
                else                              //If accessed after 19
                {
                    $this->slot1 = 3;             //Next Week Slot 
                    $this->slot2 = 3;             //Next Week Slot 
                    $this->slot3 = 3;             //Next Week Slot 
                    $this->slot4 = 3;             //Next Week Slot
                    $this->slot5 = 3;             //Next Week Slot
                    $this->slot6 = 3;             //Next Week Slot
                    $this->slot7 = 3;             //Next Week Slot
                    $this->slot8 = 3;             //Next Week Slot
                    $this->slot9 = 3;             //Next Week Slot
                }
            }

            //If today is Friday or Saturday
            else if(date("w") == 5 || date("w") == 6)
            {
                $this->slot1 = 3;             //Next Week Slot 
                $this->slot2 = 3;             //Next Week Slot 
                $this->slot3 = 3;             //Next Week Slot 
                $this->slot4 = 3;             //Next Week Slot
                $this->slot5 = 3;             //Next Week Slot
                $this->slot6 = 3;             //Next Week Slot
                $this->slot7 = 3;             //Next Week Slot
                $this->slot8 = 3;             //Next Week Slot
                $this->slot9 = 3;             //Next Week Slot
            }

            //If today is Sunday, Monday or Tuesday
            else if ((date("w") == 0) || (date("w") == 1) || (date("w") == 2))
            {
                $this->slot1 = 2;             //This Week Slot 
                $this->slot2 = 2;             //This Week Slot 
                $this->slot3 = 2;             //This Week Slot 
                $this->slot4 = 2;             //This Week Slot
                $this->slot5 = 2;             //This Week Slot
                $this->slot6 = 2;             //This Week Slot
                $this->slot7 = 2;             //This Week Slot
                $this->slot8 = 2;             //This Week Slot
                $this->slot9 = 2;             //This Week Slot
            }
            else{
                // $this->slot1 = 4;             //This Week Slot 
                // $this->slot2 = 4;             //This Week Slot 
                // $this->slot3 = 4;             //This Week Slot 
                // $this->slot4 = 4;             //This Week Slot
                // $this->slot5 = 4;             //This Week Slot
                // $this->slot6 = 4;             //This Week Slot
                // $this->slot7 = 4;             //This Week Slot
                // $this->slot8 = 4;             //This Week Slot
                // $this->slot9 = 4;             //This Week Slot
            }
        }
    
        /**
         * Returns whether the slot shall bw disabled or enabled for this or next week where
         * 1 being disabled
         * 2 being enabled for this week and
         * 3 being enabled for next week
         */
        function getAvailabilityStatus($slotno)
        {   
            if($slotno == 1)
                return $this->slot1;
            else if($slotno == 2)
                return $this->slot2;
            else if($slotno == 3)
                return $this->slot3;
            else if($slotno == 4)
                return $this->slot4;
            else if($slotno == 5)
                return $this->slot5;
            else if($slotno == 6)
                return $this->slot6;
            else if($slotno == 7)
                return $this->slot7;
            else if($slotno == 8)
                return $this->slot8;
            else if($slotno == 9)
                return $this->slot9;
            else{}
        }

        /**
         * Returns the date to be displayed in theslot selection
         */
        public function displaySlotDate($slotno, $slot)
        {    echo "here";
            //If slot is disabled    
            if($slot == 1)
            {
                if($slotno == 1 || $slotno == 2 || $slotno == 3)
                {
                    $dayDiff = 3 - date("w") ;
                    return date("m/d/yy", strtotime("+$dayDiff days"));

                }
                else if($slotno == 4 || $slotno == 5 || $slotno == 6)
                {
                    $dayDiff = 4 - date("w") ;
                    return date("m/d/yy", strtotime("+$dayDiff days"));
                }
                else
                {
                    $dayDiff = 5 - date("w") ;
                    return date("m/d/yy", strtotime("+$dayDiff days"));
                }
            }

            //If slothist is disabled    
            if($slot == 2)
            {
                if($slotno == 1 || $slotno == 2 || $slotno == 3)
                {
                    $dayDiff = 3 - date("w") ;
                    return date("m/d/yy", strtotime("+$dayDiff days"));

                }
                else if($slotno == 4 || $slotno == 5 || $slotno == 6)
                {
                    $dayDiff = 4 - date("w") ;
                    return date("m/d/yy", strtotime("+$dayDiff days"));
                }
                else
                {
                    $dayDiff = 5 - date("w") ;
                    return date("m/d/yy", strtotime("+$dayDiff days"));
                }
            }

            //If next week slot is available 
            if($slot == 3)
            {  
                if($slotno == 1 || $slotno == 2 || $slotno == 3)
                {
                    $dayDiff = 3 - date("w") + 7;
                    return date("m/d/yy", strtotime("+$dayDiff days"));
                }
                else if($slotno == 4 || $slotno == 5 || $slotno == 6)
                {
                    $dayDiff = 4 - date("w") + 7;
                    return date("m/d/yy", strtotime("+$dayDiff days"));
                }
                else
                {
                    $dayDiff = 5 - date("w") + 7;
                    return date("m/d/yy", strtotime("+$dayDiff days"));
                }
            }
        }


        /**
         * Fetch orders placed of the slot
         */
        public function fetchSlotOrders($slotnum, $week)
        {
            //For this week slot
            if($week == 1)
            {
                $orders = 0;
                $script = oci_parse($this->connect(), "SELECT * FROM COLLECTION_SLOT WHERE SLOT_NO = $slotnum");
                oci_execute($script);
                while($row = oci_fetch_assoc($script))
                {
                    $orders = $row['THIS_WEEK_ORDERS'];
                }
                return $orders;
            }

            //For next week slot
            if($week == 2)
            {
                $orders = 0;
                $script = oci_parse($this->connect(), "SELECT * FROM COLLECTION_SLOT WHERE SLOT_NO = $slotnum");
                oci_execute($script);
                while($row = oci_fetch_assoc($script))
                {
                    $orders = $row['NEXT_WEEK_ORDERS'];
                }
                return $orders;
            }

        }

        
    } 
?>
   

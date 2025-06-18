
     <?php
        include('connection.php');
        $place;
        function CheckUserExists($Username)
        {
            $conn = OpenCon();
            $sql = "SELECT * FROM user where Username='" . $Username . "';";
            $result = mysqli_query($conn, $sql);
            CloseCon($conn);
            return $result;
        }
        function register($username,$email, $password)
        {
            $conn = OpenCon();
            $sql = "insert into web2.user(Username,Password,Email) values('" . $username . "','" . $password . "','" . $email . "');";
            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
        }
        function InsertPassenger($Fname, $Lname, $age, $phone, $credit, $tickets, $UID, $FID)
        {
            $conn = OpenCon();
            $sql = "insert into web2.passenger(FirstName,LastName,Age,Phone,CreditCardNumber,Tickets, user_id) values('$Fname','$Lname', $age, $phone, $credit, $tickets, $UID)";
            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
            
        }
        function InsertIdflight($id)
        {
            $conn = OpenCon();
            $sql = "insert into web2.order (Idadded) values ('" . $id . "');";
            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
        }
        function CheckRegistration()
        {
            $conn = OpenCon();
            $sql = "select IDUser,f.IDFlight,DepartureDate,ReturnDate,Class,Price,Image,c.Name Destination from web2.flight f , web2.bookedflights bf,web2.user u,web2.city c
    where f.IDFlight=bf.flight_id  and f.Idcity=c.Idcity  and u.IDUser = bf.user_id;";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function SigninCheck($username,$Email, $Pass)
        {
            $conn = OpenCon();
            $sql = "SELECT * from user where Username='" . $username . "' and Password='" . $Pass . "' and Email='" . $Email . "'";
            $result = mysqli_query($conn, $sql);
            
            $rows = mysqli_num_rows($result);
            return $rows;

            CloseCon($conn);
        }
        function getUserInfo($username,$Email, $Pass)
        {
            $conn = OpenCon();
            $sql = "SELECT * from user where Username='" . $username . "' and Password='" . $Pass . "' and Email='" . $Email . "'";
            $result = mysqli_query($conn, $sql);
            
            return $result;

            CloseCon($conn);
        }
        function SearchPlace($destination)
        {
            $conn = OpenCon();
            $sql = "select IDFlight,DepartureDate,ReturnDate,Class,Price,passengerCapacity,c.Image Image,c.Name Destination,c.num_of_passengers from web2.flight f ,web2.city c where f.Idcity=c.Idcity   and c.Name like '%" . $destination . "%';";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function allFlight()
        {
            $conn = OpenCon();
            $sql = "select f.*,c.Image Image ,c.Name City,cou.Name Country from web2.flight f ,web2.city c,web2.country cou where f.Idcity=c.Idcity and c.IdCountry=cou.IDCountry;";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function DeletFL($id)
        {
            $conn = OpenCon();
            $sql = "Delete from web2.flight where IDFlight='" . $id . "';";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function dltPassenger($id)
        {
            $conn = OpenCon();
            $sql = "Delete from web2.passenger where PID='" . $id . "';";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function DeletRG($uid ,$fid)
        {
            $conn = OpenCon();
            $sql = "Delete from web2.bookedflights where user_id= $uid and flight_id = $fid;";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function Checkd($destination)
        {
            $conn = OpenCon();
            $sql = "select IDCity from web2.city where Name='" . $destination . "';";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function CheckCoun($Country)
        {
            $conn = OpenCon();
            $sql = "select IDCountry from web2.country where Name='" . $Country . "';";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function newcity($destination, $idCountry, $image)
        {
            $conn = OpenCon();
            $sql = "insert into web2.city (Name,IdCountry, Image) values('" . $destination . "','" . $idCountry . "', '" . $image . "');";
            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
        }
        function insertcoun($Country)
        {
            $conn = OpenCon();
            $sql = "insert into web2.country (Name) values('" . $Country . "');";
            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
        }
        function insertF($DepartureDate, $ReturnDate, $Class, $Price, $capacity, $iddestination)
        {
            $conn = OpenCon();
            $sql = "insert into web2.flight (DepartureDate,ReturnDate,Class,Price,passengerCapacity,IdCity) values('" . $DepartureDate . "','" . $ReturnDate . "','" . $Class . "','" . $Price . "','" . $capacity . "','" . $iddestination . "');";
            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
        }
        function UpdateF($id, $DepartureDate, $ReturnDate, $Price)
        {
            $conn = OpenCon();
            // update  web2.flight set DepartureDate='".$DepartureDate."' where IDFlight='".$id."';
            $sql = "update  web2.flight set DepartureDate='" . $DepartureDate . "', ReturnDate='" . $ReturnDate . "',Price='" . $Price . "' where IDFlight='" . $id . "';";
            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }
        }
        function searchid($id)
        {
            $conn = OpenCon();
            $sql = "select f.*,c.Name Destination from web2.flight f ,web2.city c where f.Idcity=c.Idcity and IDFlight='" . $id . "';";
            $result = mysqli_query($conn, $sql);

            return $result;

            CloseCon($conn);
        }
        function emailChange($email, $id){
            $conn = OpenCon();
            $sql = "UPDATE user SET Email = '$email' WHERE IDUser = '$id'";
            $result = mysqli_query($conn, $sql);

            return $result;
            CloseCon($conn);
        }
        function passChange($pass, $id){
            $conn = OpenCon();
            
            $sql = "UPDATE user SET Password = '$pass' WHERE IDUser = '$id'";
            $result = mysqli_query($conn, $sql);

            return $result;
            CloseCon($conn);
        }

        function get_user($username, $email, $pass){
            $conn = OpenCon();
            $sql = "SELECT * FROM user WHERE Username = '$username' AND Email = '$email' AND Password = '$pass'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);
            return $row;
        }

        function ShowFlight($id){
            $conn = OpenCon();
            $sql = "SELECT * FROM web2.flight WHERE IDFlight = $id";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);
            return $row;
        }

        function FlightUpdate($DepartureDate, $ReturnDate, $Price, $capacity, $id){

            $conn = OpenCon(); 
            $sql = "UPDATE web2.flight SET DepartureDate = '$DepartureDate', ReturnDate = '$ReturnDate', Price = $Price, passengerCapacity = $capacity WHERE IDFlight = $id";
            $result = mysqli_query($conn, $sql);

            return $result;
        }

        function flightsBooked(){
            $conn = OpenCon(); 
            $sql = "SELECT * FROM web2.bookedflights";

            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result);

            return $rows;
        }

        function userIsPassenger(){
            $conn = OpenCon();
            $sql = "SELECT p.user_id FROM passenger p JOIN user u ON p.user_id = u.IDUser";
            $result = mysqli_query($conn, $sql);
            
            return $result;
        }
        function  getflights($id){
            $conn = OpenCon();
            $sql = "SELECT *,c.Name Destination FROM flight f, bookedflights bf, city c where bf.user_id = $id and bf.flight_id = f.IDFlight and f.IDCity = c.IDCity";
            $result = mysqli_query($conn, $sql);
            
            return $result;
        }

        function insertIntoBookedFlights($flight_id, $user_id){
            $conn = OpenCon();
            $sql = "INSERT INTO bookedflights(user_id, flight_id) VALUES ($user_id, $flight_id)";

            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            }


        }

        function getNumOFPasseng(){
            $conn = OpenCon();
            // $sql = "SELECT c.Name, f.IdCity, num_of_passengers FROM flight f 
            // JOIN bookedflights bf ON f.IDFlight = bf.flight_id 
            // JOIN city c ON c.IDFlight = c.flight_id";
            $sql = "SELECT * FROM city";

            $result = mysqli_query($conn, $sql);
            
            return $result;
        }
        function PassengersGet(){
            $conn = OpenCon();

            $sql = "SELECT *,u.Email FROM passenger p, user u where u.IDUser = p.user_id ";

            $result = mysqli_query($conn, $sql);
            
            return $result;
        }

        function  allCities(){
            $conn = OpenCon();

            $sql = "SELECT * FROM city, country where city.IDCountry = country.IDCountry";

            $result = mysqli_query($conn, $sql);
            
            return $result;
        }
        function getPassengerById($id){
            $conn = OpenCon();

            $sql = "SELECT * FROM passenger WHERE PID = $id";

            $result = mysqli_query($conn, $sql);
            
            return $result;
        }
        
        function insertTickets($fname, $lname, $age, $PID, $FID){
            $conn = OpenCon();

            $sql = "INSERT INTO tickets(FirstName, LastName, Age, passenger_id, flight_id) 
                    VALUES ('$fname', '$lname', $age, $PID, $FID)";

            if (mysqli_query($conn, $sql)) {
                http_response_code(200);
            } else {
                http_response_code(405);
            } 
        }

        function getIdOfPassenger($user_id){
            $conn = OpenCon();

            $sql = "SELECT * FROM passenger WHERE user_id = $user_id";

            $result = mysqli_query($conn, $sql);
            
            return $result;
        }

        function updateTickets($pid){
            $conn = OpenCon();

            $sql = "SELECT COUNT(*) AS ticket_count
                    FROM tickets
                    WHERE passenger_id = $pid;
                    ";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_row($result);
            $tickets = $row[0];

            $sql2 = "UPDATE passenger SET Tickets = $tickets WHERE PID = $pid";
            
            $result = mysqli_query($conn, $sql2);        
                        

            return $result;
        }


        function updateTotalPrice($pid){

            $conn = OpenCon();


            $sql = "SELECT SUM(PRICE) total_price FROM tickets t 
                    JOIN flight f ON f.IDFlight = t.flight_id
                    WHERE passenger_id = $pid";

            $result = mysqli_query($conn, $sql); 
            $row = mysqli_fetch_array($result); 
            $totalPrice = $row['total_price'];

            $sql2 = "UPDATE passenger SET total_price = $totalPrice WHERE PID = $pid";
            
            $result = mysqli_query($conn, $sql2);        
                        

            return $result;
        }
        ?>
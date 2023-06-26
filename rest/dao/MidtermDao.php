<?php
require_once "BaseDao.php";

class MidtermDao extends BaseDao {
    private $table_name;
    private $conn;

    public function __construct(){
        parent::__construct();
    }

    /** TODO
    * Implement DAO method used add new investor to investor table and cap-table
    */
    public function investor($id, $first_name, $last_name, $email, $company, $created_at){
        $query = "INSERT into $this->table_name";

    }

    /** TODO
    * Implement DAO method to validate email format and check if email exists
    */
    public function investor_email($email){

    }

    /** TODO
    * Implement DAO method to return list of investors according to instruction in MidtermRoutes.php
    */
    public function investors($id){

    $query = "select sc.description, sc.equity_main_currency, sc.price, sc.authorized_assets, i.first_name, i.last_name, i.email, i.company, sum(ct.diluted_shares) as total_diluted_shares
    from investors i
    join cap_table ct on i.id = ct.investor_id
    join share_classes sc on ct.share_class_id = sc.id
    where sc.id = :id
    group by i.id;";
    $stmt = $this->conn->prepare($query);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>

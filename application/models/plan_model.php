<?php

class Plan_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function getActivePlans()
    {
    	$this->db->where('is_active', 1);
    	$this->db->order_by('price', 'ASC');
    	$q = $this->db->get('plans');
    	return $q->result_array();
    }

    function getActivePlansForPricingPage()
    {
        // Add a * to the beginning of any field that starts with has. This is replaced in the view.
        $this->db->select("id, name, is_featured, tagline,price, outlets, employees, clients, treatments, products, stations, suppliers, emails_per_month AS 'Email Campaigns', 
            texts_per_month AS 'Included Texts', texts_cost_each AS 'Extra Text Cost', has_stock_control AS '*Stock Control', has_reports AS '*Reports', 
            has_pos AS '*POS', has_online_booking AS '*Online Booking', has_rewards AS '*Rewards Scheme', has_gift_cards AS '*Gift Cards'");
        $this->db->where('is_active', 1);
        $this->db->where('is_visible', 1);
        $this->db->order_by('price', 'ASC');
        $q = $this->db->get('plans');
        return $q->result_array();
    }


}
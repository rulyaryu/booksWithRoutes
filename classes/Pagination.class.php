<?php

class Pagination {
    public $perpage;
    public $page;
    public $itemsCount;


    public function __construct($perpage = 30, $page = 1, $itemsCount = 0) {
        $this->perpage = $perpage;
        $this->page = $page;
        $this->itemsCount = $itemsCount;
    }

    public function getPage() {
        return $this->page;
    }

    public function setPage($num) {
        $this->page = $num;
    }

    public function getPerpage() {
        return $this->perpage;
    }

    public function setPerpage($num) {
        $this->perpage = $num;
    }

    public function pageUp() {
        $this->page = $this->page + 1;
        return $this->page;
    }
    public function pageDown() {
        $this->page = $this->page - 1;
        return $this->page;
    }

    public function getStartItemIdx() {
        return $this->getPage() * $this->getPerpage() - $this->getPerpage();
    }

    // public function getLimitPage() {
    //     return $this->itemsCount % $this->perpage === 0 ? 
    //                 intval($this->itemsCount / $this->perpage) :
    //                 intval($this->itemsCount / $this->perpage) + 1;
    // }

    public function getLimitPage($total) {
        return $total % $this->perpage === 0 ? 
                    intval($total / $this->perpage) :
                    intval($total / $this->perpage) + 1;
    }

}

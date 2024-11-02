<?php

class Paginator
{
    protected $perPage;
    protected $currentPage;
    protected $totalItems;
    protected $items;

    public function __construct($items, $perPage, $currentPage, $totalItems)
    {
        $this->items = $items;
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
        $this->totalItems = $totalItems;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getTotalPages()
    {
        return ceil($this->totalItems / $this->perPage);
    }

    public function hasMorePages()
    {
        return $this->currentPage < $this->getTotalPages();
    }

    public function getNextPage()
    {
        return $this->hasMorePages() ? $this->currentPage + 1 : null;
    }

    public function getPreviousPage()
    {
        return $this->currentPage > 1 ? $this->currentPage - 1 : null;
    }

    public function renderPagination($baseUrl, $queryParams = [])
    {
        $totalPages = $this->getTotalPages();
        $currentPage = $this->getCurrentPage();

        $query = http_build_query($queryParams); //&param=valor&param2=valor...

        $html = '<nav aria-label="Pagation page"><ul class="pagination">';

        if ($this->getPreviousPage()) {
            $html .= '<li class="page-item"><a class="page-link" href="'.$baseUrl.'?page='.$this->getPreviousPage().'&'.$query.'">Anterion</a></li>';
        }

        for ($i=1; $i <= $totalPages; $i++) { 
            if ($i == $currentPage) {
                $html .= '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="'.$baseUrl.'?page='.$i.'&'.$query.'">'.$i.'</a></li>';
            }
        }

        if ($this->getNextPage()) {
            $html .= '<li class="page-item"><a class="page-link" href="'.$baseUrl.'?page='.$this->getNextPage().'&'.$query.'">Siguiente</a></li>';
        }

        $html .= '</ul></nav>';
        return $html;
    }
}
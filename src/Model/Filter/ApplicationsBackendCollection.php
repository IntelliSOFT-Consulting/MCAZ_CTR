<?php
// src/Model/Filter/ApplicationsCollection.php
namespace App\Model\Filter;

use Search\Model\Filter\FilterCollection;

class ApplicationsBackendCollection extends FilterCollection
{
    public function initialize()
    {
        // More $this->add() calls here. The argument for FilterCollection::add()
        // are same as those of searchManager()->add() shown above.
        $this->like('protocol_no');
    }
}
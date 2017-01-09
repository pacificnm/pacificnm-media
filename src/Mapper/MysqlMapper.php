<?php

namespace Pacificnm\Media\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Pacificnm\Mapper\AbstractMysqlMapper;
use Pacificnm\Media\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter
     * @param AdapterInterface $writeAdapter
     * @param HydratorInterface $hydrator
     * @param Entity $prototype
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
            
        $this->prototype = $prototype;
            
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Media\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll(array $filter)
    {
        $this->select = $this->readSql->select('media');
                    
        $this->filter($filter); 

        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {  
                return $this->getRows();    
            }
        }

        return $this->getPaginator();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Media\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('media');

        $this->select->where(array(
            'media.media_id = ?' => $id  
        ));
                    
        return $this->getRow();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Media\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
                    
        if ($entity->getMediaId()) {
            $this->update = new Update('media'); 
                
            $this->update->set($postData);  
                
            $this->update->where(array(
                'media.media_id = ?' => $entity->getMediaId()
            ));
                    
            $this->updateRow();            
        } else {
            $this->insert = new Insert('media'); 
                
            $this->insert->values($postData);
                
            $id = $this->createRow();
                
            $entity->setMediaId($id);        
        }
                    
        return $this->get($entity->getMediaId());
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Media\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('media');
        $this->delete->where(array(
             'media.media_id = ?' => $entity->getMediaId()
        ));
                 
        return $this->deleteRow();
    }

    /**
     * Filters and search
     *
     * @param array $filter
     * @return \Media\Mapper\MysqlMapper
     */
    protected function filter(array $filter)
    {
        return $this;
    }


}


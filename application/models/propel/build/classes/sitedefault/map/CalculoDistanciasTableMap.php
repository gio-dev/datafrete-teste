<?php



/**
 * This class defines the structure of the 'calc_distancias' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.sitedefault.map
 */
class CalculoDistanciasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'sitedefault.map.CalculoDistanciasTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('calc_distancias');
        $this->setPhpName('CalculoDistancias');
        $this->setClassname('CalculoDistancias');
        $this->setPackage('sitedefault');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, null, null);
        $this->addColumn('CEP_ORIGEM', 'CepOrigem', 'VARCHAR', true, 10, null);
        $this->addColumn('CEP_DESTINO', 'CepDestino', 'VARCHAR', true, 10, null);
        $this->addColumn('LAT_ORIGEM', 'LatOrigem', 'VARCHAR', true, 255, null);
        $this->addColumn('LAT_DESTINO', 'LatDestino', 'VARCHAR', true, 255, null);
        $this->addColumn('LONG_ORIGEM', 'LongOrigem', 'VARCHAR', true, 255, null);
        $this->addColumn('LONG_DESTINO', 'LongDestino', 'VARCHAR', true, 255, null);
        $this->addColumn('DISTANCIA_CALCULADA', 'DistanciaCalculada', 'FLOAT', true, 12, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'CREATED_AT', 'update_column' => 'UPDATED_AT', 'disable_updated_at' => 'false', 'add_columns' => 'false', ),
        );
    } // getBehaviors()

} // CalculoDistanciasTableMap

<?php


/**
 * Base class that represents a row from the 'calc_distancias' table.
 *
 *
 *
 * @package    propel.generator.sitedefault.om
 */
abstract class BaseCalculoDistancias extends EDBase implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CalculoDistanciasPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CalculoDistanciasPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        string
     */
    protected $id;

    /**
     * The value for the cep_origem field.
     * @var        string
     */
    protected $cep_origem;

    /**
     * The value for the cep_destino field.
     * @var        string
     */
    protected $cep_destino;

    /**
     * The value for the lat_origem field.
     * @var        string
     */
    protected $lat_origem;

    /**
     * The value for the lat_destino field.
     * @var        string
     */
    protected $lat_destino;

    /**
     * The value for the long_origem field.
     * @var        string
     */
    protected $long_origem;

    /**
     * The value for the long_destino field.
     * @var        string
     */
    protected $long_destino;

    /**
     * The value for the distancia_calculada field.
     * @var        double
     */
    protected $distancia_calculada;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Get the [id] column value.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [cep_origem] column value.
     *
     * @return string
     */
    public function getCepOrigem()
    {
        return $this->cep_origem;
    }

    /**
     * Get the [cep_destino] column value.
     *
     * @return string
     */
    public function getCepDestino()
    {
        return $this->cep_destino;
    }

    /**
     * Get the [lat_origem] column value.
     *
     * @return string
     */
    public function getLatOrigem()
    {
        return $this->lat_origem;
    }

    /**
     * Get the [lat_destino] column value.
     *
     * @return string
     */
    public function getLatDestino()
    {
        return $this->lat_destino;
    }

    /**
     * Get the [long_origem] column value.
     *
     * @return string
     */
    public function getLongOrigem()
    {
        return $this->long_origem;
    }

    /**
     * Get the [long_destino] column value.
     *
     * @return string
     */
    public function getLongDestino()
    {
        return $this->long_destino;
    }

    /**
     * Get the [distancia_calculada] column value.
     *
     * @return double
     */
    public function getDistanciaCalculada()
    {
        return $this->distancia_calculada;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->created_at);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->updated_at);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param string $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [cep_origem] column.
     *
     * @param string $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setCepOrigem($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cep_origem !== $v) {
            $this->cep_origem = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::CEP_ORIGEM;
        }


        return $this;
    } // setCepOrigem()

    /**
     * Set the value of [cep_destino] column.
     *
     * @param string $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setCepDestino($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cep_destino !== $v) {
            $this->cep_destino = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::CEP_DESTINO;
        }


        return $this;
    } // setCepDestino()

    /**
     * Set the value of [lat_origem] column.
     *
     * @param string $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setLatOrigem($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lat_origem !== $v) {
            $this->lat_origem = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::LAT_ORIGEM;
        }


        return $this;
    } // setLatOrigem()

    /**
     * Set the value of [lat_destino] column.
     *
     * @param string $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setLatDestino($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lat_destino !== $v) {
            $this->lat_destino = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::LAT_DESTINO;
        }


        return $this;
    } // setLatDestino()

    /**
     * Set the value of [long_origem] column.
     *
     * @param string $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setLongOrigem($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->long_origem !== $v) {
            $this->long_origem = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::LONG_ORIGEM;
        }


        return $this;
    } // setLongOrigem()

    /**
     * Set the value of [long_destino] column.
     *
     * @param string $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setLongDestino($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->long_destino !== $v) {
            $this->long_destino = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::LONG_DESTINO;
        }


        return $this;
    } // setLongDestino()

    /**
     * Set the value of [distancia_calculada] column.
     *
     * @param double $v new value
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setDistanciaCalculada($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->distancia_calculada !== $v) {
            $this->distancia_calculada = $v;
            $this->modifiedColumns[] = CalculoDistanciasPeer::DISTANCIA_CALCULADA;
        }


        return $this;
    } // setDistanciaCalculada()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = CalculoDistanciasPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return CalculoDistancias The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = CalculoDistanciasPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->cep_origem = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->cep_destino = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->lat_origem = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->lat_destino = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->long_origem = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->long_destino = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->distancia_calculada = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
            $this->created_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->updated_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = CalculoDistanciasPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating CalculoDistancias object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CalculoDistanciasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CalculoDistanciasPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CalculoDistanciasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CalculoDistanciasQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CalculoDistanciasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(CalculoDistanciasPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(CalculoDistanciasPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(CalculoDistanciasPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CalculoDistanciasPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = CalculoDistanciasPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CalculoDistanciasPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CalculoDistanciasPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::CEP_ORIGEM)) {
            $modifiedColumns[':p' . $index++]  = '`CEP_ORIGEM`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::CEP_DESTINO)) {
            $modifiedColumns[':p' . $index++]  = '`CEP_DESTINO`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::LAT_ORIGEM)) {
            $modifiedColumns[':p' . $index++]  = '`LAT_ORIGEM`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::LAT_DESTINO)) {
            $modifiedColumns[':p' . $index++]  = '`LAT_DESTINO`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::LONG_ORIGEM)) {
            $modifiedColumns[':p' . $index++]  = '`LONG_ORIGEM`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::LONG_DESTINO)) {
            $modifiedColumns[':p' . $index++]  = '`LONG_DESTINO`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::DISTANCIA_CALCULADA)) {
            $modifiedColumns[':p' . $index++]  = '`DISTANCIA_CALCULADA`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`CREATED_AT`';
        }
        if ($this->isColumnModified(CalculoDistanciasPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`UPDATED_AT`';
        }

        $sql = sprintf(
            'INSERT INTO `calc_distancias` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_STR);
                        break;
                    case '`CEP_ORIGEM`':
                        $stmt->bindValue($identifier, $this->cep_origem, PDO::PARAM_STR);
                        break;
                    case '`CEP_DESTINO`':
                        $stmt->bindValue($identifier, $this->cep_destino, PDO::PARAM_STR);
                        break;
                    case '`LAT_ORIGEM`':
                        $stmt->bindValue($identifier, $this->lat_origem, PDO::PARAM_STR);
                        break;
                    case '`LAT_DESTINO`':
                        $stmt->bindValue($identifier, $this->lat_destino, PDO::PARAM_STR);
                        break;
                    case '`LONG_ORIGEM`':
                        $stmt->bindValue($identifier, $this->long_origem, PDO::PARAM_STR);
                        break;
                    case '`LONG_DESTINO`':
                        $stmt->bindValue($identifier, $this->long_destino, PDO::PARAM_STR);
                        break;
                    case '`DISTANCIA_CALCULADA`':
                        $stmt->bindValue($identifier, $this->distancia_calculada, PDO::PARAM_STR);
                        break;
                    case '`CREATED_AT`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`UPDATED_AT`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = CalculoDistanciasPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CalculoDistanciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getCepOrigem();
                break;
            case 2:
                return $this->getCepDestino();
                break;
            case 3:
                return $this->getLatOrigem();
                break;
            case 4:
                return $this->getLatDestino();
                break;
            case 5:
                return $this->getLongOrigem();
                break;
            case 6:
                return $this->getLongDestino();
                break;
            case 7:
                return $this->getDistanciaCalculada();
                break;
            case 8:
                return $this->getCreatedAt();
                break;
            case 9:
                return $this->getUpdatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['CalculoDistancias'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CalculoDistancias'][$this->getPrimaryKey()] = true;
        $keys = CalculoDistanciasPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCepOrigem(),
            $keys[2] => $this->getCepDestino(),
            $keys[3] => $this->getLatOrigem(),
            $keys[4] => $this->getLatDestino(),
            $keys[5] => $this->getLongOrigem(),
            $keys[6] => $this->getLongDestino(),
            $keys[7] => $this->getDistanciaCalculada(),
            $keys[8] => $this->getCreatedAt(),
            $keys[9] => $this->getUpdatedAt(),
        );

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CalculoDistanciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setCepOrigem($value);
                break;
            case 2:
                $this->setCepDestino($value);
                break;
            case 3:
                $this->setLatOrigem($value);
                break;
            case 4:
                $this->setLatDestino($value);
                break;
            case 5:
                $this->setLongOrigem($value);
                break;
            case 6:
                $this->setLongDestino($value);
                break;
            case 7:
                $this->setDistanciaCalculada($value);
                break;
            case 8:
                $this->setCreatedAt($value);
                break;
            case 9:
                $this->setUpdatedAt($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = CalculoDistanciasPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCepOrigem($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCepDestino($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLatOrigem($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLatDestino($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLongOrigem($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLongDestino($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDistanciaCalculada($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CalculoDistanciasPeer::DATABASE_NAME);

        if ($this->isColumnModified(CalculoDistanciasPeer::ID)) $criteria->add(CalculoDistanciasPeer::ID, $this->id);
        if ($this->isColumnModified(CalculoDistanciasPeer::CEP_ORIGEM)) $criteria->add(CalculoDistanciasPeer::CEP_ORIGEM, $this->cep_origem);
        if ($this->isColumnModified(CalculoDistanciasPeer::CEP_DESTINO)) $criteria->add(CalculoDistanciasPeer::CEP_DESTINO, $this->cep_destino);
        if ($this->isColumnModified(CalculoDistanciasPeer::LAT_ORIGEM)) $criteria->add(CalculoDistanciasPeer::LAT_ORIGEM, $this->lat_origem);
        if ($this->isColumnModified(CalculoDistanciasPeer::LAT_DESTINO)) $criteria->add(CalculoDistanciasPeer::LAT_DESTINO, $this->lat_destino);
        if ($this->isColumnModified(CalculoDistanciasPeer::LONG_ORIGEM)) $criteria->add(CalculoDistanciasPeer::LONG_ORIGEM, $this->long_origem);
        if ($this->isColumnModified(CalculoDistanciasPeer::LONG_DESTINO)) $criteria->add(CalculoDistanciasPeer::LONG_DESTINO, $this->long_destino);
        if ($this->isColumnModified(CalculoDistanciasPeer::DISTANCIA_CALCULADA)) $criteria->add(CalculoDistanciasPeer::DISTANCIA_CALCULADA, $this->distancia_calculada);
        if ($this->isColumnModified(CalculoDistanciasPeer::CREATED_AT)) $criteria->add(CalculoDistanciasPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(CalculoDistanciasPeer::UPDATED_AT)) $criteria->add(CalculoDistanciasPeer::UPDATED_AT, $this->updated_at);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(CalculoDistanciasPeer::DATABASE_NAME);
        $criteria->add(CalculoDistanciasPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of CalculoDistancias (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCepOrigem($this->getCepOrigem());
        $copyObj->setCepDestino($this->getCepDestino());
        $copyObj->setLatOrigem($this->getLatOrigem());
        $copyObj->setLatDestino($this->getLatDestino());
        $copyObj->setLongOrigem($this->getLongOrigem());
        $copyObj->setLongDestino($this->getLongDestino());
        $copyObj->setDistanciaCalculada($this->getDistanciaCalculada());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return CalculoDistancias Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return CalculoDistanciasPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CalculoDistanciasPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->cep_origem = null;
        $this->cep_destino = null;
        $this->lat_origem = null;
        $this->lat_destino = null;
        $this->long_origem = null;
        $this->long_destino = null;
        $this->distancia_calculada = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CalculoDistanciasPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     CalculoDistancias The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = CalculoDistanciasPeer::UPDATED_AT;

        return $this;
    }

}

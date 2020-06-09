<?php


/**
 * Base class that represents a query for the 'calc_distancias' table.
 *
 *
 *
 * @method CalculoDistanciasQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method CalculoDistanciasQuery orderByCepOrigem($order = Criteria::ASC) Order by the CEP_ORIGEM column
 * @method CalculoDistanciasQuery orderByCepDestino($order = Criteria::ASC) Order by the CEP_DESTINO column
 * @method CalculoDistanciasQuery orderByLatOrigem($order = Criteria::ASC) Order by the LAT_ORIGEM column
 * @method CalculoDistanciasQuery orderByLatDestino($order = Criteria::ASC) Order by the LAT_DESTINO column
 * @method CalculoDistanciasQuery orderByLongOrigem($order = Criteria::ASC) Order by the LONG_ORIGEM column
 * @method CalculoDistanciasQuery orderByLongDestino($order = Criteria::ASC) Order by the LONG_DESTINO column
 * @method CalculoDistanciasQuery orderByDistanciaCalculada($order = Criteria::ASC) Order by the DISTANCIA_CALCULADA column
 * @method CalculoDistanciasQuery orderByCreatedAt($order = Criteria::ASC) Order by the CREATED_AT column
 * @method CalculoDistanciasQuery orderByUpdatedAt($order = Criteria::ASC) Order by the UPDATED_AT column
 *
 * @method CalculoDistanciasQuery groupById() Group by the ID column
 * @method CalculoDistanciasQuery groupByCepOrigem() Group by the CEP_ORIGEM column
 * @method CalculoDistanciasQuery groupByCepDestino() Group by the CEP_DESTINO column
 * @method CalculoDistanciasQuery groupByLatOrigem() Group by the LAT_ORIGEM column
 * @method CalculoDistanciasQuery groupByLatDestino() Group by the LAT_DESTINO column
 * @method CalculoDistanciasQuery groupByLongOrigem() Group by the LONG_ORIGEM column
 * @method CalculoDistanciasQuery groupByLongDestino() Group by the LONG_DESTINO column
 * @method CalculoDistanciasQuery groupByDistanciaCalculada() Group by the DISTANCIA_CALCULADA column
 * @method CalculoDistanciasQuery groupByCreatedAt() Group by the CREATED_AT column
 * @method CalculoDistanciasQuery groupByUpdatedAt() Group by the UPDATED_AT column
 *
 * @method CalculoDistanciasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CalculoDistanciasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CalculoDistanciasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CalculoDistancias findOne(PropelPDO $con = null) Return the first CalculoDistancias matching the query
 * @method CalculoDistancias findOneOrCreate(PropelPDO $con = null) Return the first CalculoDistancias matching the query, or a new CalculoDistancias object populated from the query conditions when no match is found
 *
 * @method CalculoDistancias findOneById(string $ID) Return the first CalculoDistancias filtered by the ID column
 * @method CalculoDistancias findOneByCepOrigem(string $CEP_ORIGEM) Return the first CalculoDistancias filtered by the CEP_ORIGEM column
 * @method CalculoDistancias findOneByCepDestino(string $CEP_DESTINO) Return the first CalculoDistancias filtered by the CEP_DESTINO column
 * @method CalculoDistancias findOneByLatOrigem(string $LAT_ORIGEM) Return the first CalculoDistancias filtered by the LAT_ORIGEM column
 * @method CalculoDistancias findOneByLatDestino(string $LAT_DESTINO) Return the first CalculoDistancias filtered by the LAT_DESTINO column
 * @method CalculoDistancias findOneByLongOrigem(string $LONG_ORIGEM) Return the first CalculoDistancias filtered by the LONG_ORIGEM column
 * @method CalculoDistancias findOneByLongDestino(string $LONG_DESTINO) Return the first CalculoDistancias filtered by the LONG_DESTINO column
 * @method CalculoDistancias findOneByDistanciaCalculada(double $DISTANCIA_CALCULADA) Return the first CalculoDistancias filtered by the DISTANCIA_CALCULADA column
 * @method CalculoDistancias findOneByCreatedAt(string $CREATED_AT) Return the first CalculoDistancias filtered by the CREATED_AT column
 * @method CalculoDistancias findOneByUpdatedAt(string $UPDATED_AT) Return the first CalculoDistancias filtered by the UPDATED_AT column
 *
 * @method array findById(string $ID) Return CalculoDistancias objects filtered by the ID column
 * @method array findByCepOrigem(string $CEP_ORIGEM) Return CalculoDistancias objects filtered by the CEP_ORIGEM column
 * @method array findByCepDestino(string $CEP_DESTINO) Return CalculoDistancias objects filtered by the CEP_DESTINO column
 * @method array findByLatOrigem(string $LAT_ORIGEM) Return CalculoDistancias objects filtered by the LAT_ORIGEM column
 * @method array findByLatDestino(string $LAT_DESTINO) Return CalculoDistancias objects filtered by the LAT_DESTINO column
 * @method array findByLongOrigem(string $LONG_ORIGEM) Return CalculoDistancias objects filtered by the LONG_ORIGEM column
 * @method array findByLongDestino(string $LONG_DESTINO) Return CalculoDistancias objects filtered by the LONG_DESTINO column
 * @method array findByDistanciaCalculada(double $DISTANCIA_CALCULADA) Return CalculoDistancias objects filtered by the DISTANCIA_CALCULADA column
 * @method array findByCreatedAt(string $CREATED_AT) Return CalculoDistancias objects filtered by the CREATED_AT column
 * @method array findByUpdatedAt(string $UPDATED_AT) Return CalculoDistancias objects filtered by the UPDATED_AT column
 *
 * @package    propel.generator.sitedefault.om
 */
abstract class BaseCalculoDistanciasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCalculoDistanciasQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'sitedefault', $modelName = 'CalculoDistancias', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CalculoDistanciasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CalculoDistanciasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CalculoDistanciasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CalculoDistanciasQuery) {
            return $criteria;
        }
        $query = new CalculoDistanciasQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   CalculoDistancias|CalculoDistancias[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CalculoDistanciasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CalculoDistanciasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   CalculoDistancias A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CEP_ORIGEM`, `CEP_DESTINO`, `LAT_ORIGEM`, `LAT_DESTINO`, `LONG_ORIGEM`, `LONG_DESTINO`, `DISTANCIA_CALCULADA`, `CREATED_AT`, `UPDATED_AT` FROM `calc_distancias` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new CalculoDistancias();
            $obj->hydrate($row);
            CalculoDistanciasPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return CalculoDistancias|CalculoDistancias[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|CalculoDistancias[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CalculoDistanciasPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CalculoDistanciasPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE ID = 'fooValue'
     * $query->filterById('%fooValue%'); // WHERE ID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $id)) {
                $id = str_replace('*', '%', $id);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the CEP_ORIGEM column
     *
     * Example usage:
     * <code>
     * $query->filterByCepOrigem('fooValue');   // WHERE CEP_ORIGEM = 'fooValue'
     * $query->filterByCepOrigem('%fooValue%'); // WHERE CEP_ORIGEM LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cepOrigem The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByCepOrigem($cepOrigem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cepOrigem)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cepOrigem)) {
                $cepOrigem = str_replace('*', '%', $cepOrigem);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::CEP_ORIGEM, $cepOrigem, $comparison);
    }

    /**
     * Filter the query on the CEP_DESTINO column
     *
     * Example usage:
     * <code>
     * $query->filterByCepDestino('fooValue');   // WHERE CEP_DESTINO = 'fooValue'
     * $query->filterByCepDestino('%fooValue%'); // WHERE CEP_DESTINO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cepDestino The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByCepDestino($cepDestino = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cepDestino)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cepDestino)) {
                $cepDestino = str_replace('*', '%', $cepDestino);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::CEP_DESTINO, $cepDestino, $comparison);
    }

    /**
     * Filter the query on the LAT_ORIGEM column
     *
     * Example usage:
     * <code>
     * $query->filterByLatOrigem('fooValue');   // WHERE LAT_ORIGEM = 'fooValue'
     * $query->filterByLatOrigem('%fooValue%'); // WHERE LAT_ORIGEM LIKE '%fooValue%'
     * </code>
     *
     * @param     string $latOrigem The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByLatOrigem($latOrigem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($latOrigem)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $latOrigem)) {
                $latOrigem = str_replace('*', '%', $latOrigem);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::LAT_ORIGEM, $latOrigem, $comparison);
    }

    /**
     * Filter the query on the LAT_DESTINO column
     *
     * Example usage:
     * <code>
     * $query->filterByLatDestino('fooValue');   // WHERE LAT_DESTINO = 'fooValue'
     * $query->filterByLatDestino('%fooValue%'); // WHERE LAT_DESTINO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $latDestino The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByLatDestino($latDestino = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($latDestino)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $latDestino)) {
                $latDestino = str_replace('*', '%', $latDestino);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::LAT_DESTINO, $latDestino, $comparison);
    }

    /**
     * Filter the query on the LONG_ORIGEM column
     *
     * Example usage:
     * <code>
     * $query->filterByLongOrigem('fooValue');   // WHERE LONG_ORIGEM = 'fooValue'
     * $query->filterByLongOrigem('%fooValue%'); // WHERE LONG_ORIGEM LIKE '%fooValue%'
     * </code>
     *
     * @param     string $longOrigem The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByLongOrigem($longOrigem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longOrigem)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $longOrigem)) {
                $longOrigem = str_replace('*', '%', $longOrigem);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::LONG_ORIGEM, $longOrigem, $comparison);
    }

    /**
     * Filter the query on the LONG_DESTINO column
     *
     * Example usage:
     * <code>
     * $query->filterByLongDestino('fooValue');   // WHERE LONG_DESTINO = 'fooValue'
     * $query->filterByLongDestino('%fooValue%'); // WHERE LONG_DESTINO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $longDestino The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByLongDestino($longDestino = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longDestino)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $longDestino)) {
                $longDestino = str_replace('*', '%', $longDestino);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::LONG_DESTINO, $longDestino, $comparison);
    }

    /**
     * Filter the query on the DISTANCIA_CALCULADA column
     *
     * Example usage:
     * <code>
     * $query->filterByDistanciaCalculada(1234); // WHERE DISTANCIA_CALCULADA = 1234
     * $query->filterByDistanciaCalculada(array(12, 34)); // WHERE DISTANCIA_CALCULADA IN (12, 34)
     * $query->filterByDistanciaCalculada(array('min' => 12)); // WHERE DISTANCIA_CALCULADA > 12
     * </code>
     *
     * @param     mixed $distanciaCalculada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByDistanciaCalculada($distanciaCalculada = null, $comparison = null)
    {
        if (is_array($distanciaCalculada)) {
            $useMinMax = false;
            if (isset($distanciaCalculada['min'])) {
                $this->addUsingAlias(CalculoDistanciasPeer::DISTANCIA_CALCULADA, $distanciaCalculada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($distanciaCalculada['max'])) {
                $this->addUsingAlias(CalculoDistanciasPeer::DISTANCIA_CALCULADA, $distanciaCalculada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::DISTANCIA_CALCULADA, $distanciaCalculada, $comparison);
    }

    /**
     * Filter the query on the CREATED_AT column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE CREATED_AT = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE CREATED_AT = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE CREATED_AT > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CalculoDistanciasPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CalculoDistanciasPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the UPDATED_AT column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE UPDATED_AT = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE UPDATED_AT = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE UPDATED_AT > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CalculoDistanciasPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CalculoDistanciasPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalculoDistanciasPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   CalculoDistancias $calculoDistancias Object to remove from the list of results
     *
     * @return CalculoDistanciasQuery The current query, for fluid interface
     */
    public function prune($calculoDistancias = null)
    {
        if ($calculoDistancias) {
            $this->addUsingAlias(CalculoDistanciasPeer::ID, $calculoDistancias->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     CalculoDistanciasQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CalculoDistanciasPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     CalculoDistanciasQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CalculoDistanciasPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     CalculoDistanciasQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CalculoDistanciasPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     CalculoDistanciasQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CalculoDistanciasPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     CalculoDistanciasQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CalculoDistanciasPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     CalculoDistanciasQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CalculoDistanciasPeer::CREATED_AT);
    }
}

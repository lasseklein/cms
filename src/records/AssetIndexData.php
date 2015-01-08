<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\records;

use craft\app\enums\AttributeType;
use craft\app\enums\ColumnType;

/**
 * Class AssetIndexData record.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class AssetIndexData extends BaseRecord
{
	// Public Methods
	// =========================================================================

	/**
	 * @inheritDoc BaseRecord::getTableName()
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return 'assetindexdata';
	}

	/**
	 * @inheritDoc BaseRecord::defineRelations()
	 *
	 * @return array
	 */
	public function defineRelations()
	{
		return [
			'source' => [static::BELONGS_TO, 'AssetSource', 'required' => true, 'onDelete' => static::CASCADE],
		];
	}

	/**
	 * @inheritDoc BaseRecord::defineIndexes()
	 *
	 * @return array
	 */
	public function defineIndexes()
	{
		return [
			['columns' => ['sessionId', 'sourceId', 'offset'], 'unique' => true],
		];
	}

	// Protected Methods
	// =========================================================================

	/**
	 * @inheritDoc BaseRecord::defineAttributes()
	 *
	 * @return array
	 */
	protected function defineAttributes()
	{
		return [
			'sessionId' 	=> [ColumnType::Char, 'length' => 36, 'required' => true, 'default' => ''],
			'sourceId' 		=> [AttributeType::Number, 'required' => true],
			'offset'  		=> [AttributeType::Number, 'required' => true],
			'uri'  			=> [ColumnType::Varchar, 'maxLength' => 255],
			'size' 			=> [AttributeType::Number],
			'recordId'		=> [AttributeType::Number],
		];
	}
}

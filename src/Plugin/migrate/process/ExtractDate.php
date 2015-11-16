<?php

/**
 * @file
 * Contains \Drupal\book_migration\Plugin\migrate\callback\ExtractDate.
 */

namespace Drupal\book_migration\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * @MigrateProcessPlugin(
 *   id = "extract_date",
 * )
 */
class ExtractDate extends ProcessPluginBase {
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (empty($this->configuration['format'])) {
      throw new MigrateException('Expected date format is not defined.');
    }

    if ($timestamp = strtotime($value)) {
      return date($this->configuration['format'], $timestamp);
    }
  }
}

<oai_dc:dc
    xmlns:oai_dc="http://www.openarchives.org/OAI/2.0/oai_dc/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.openarchives.org/OAI/2.0/oai_dc/
    http://www.openarchives.org/OAI/2.0/oai_dc.xsd">

  <dc:title><?php echo esc_specialchars(strval($resource->title)) ?></dc:title>

  <?php foreach ($resource->getCreators() as $item): ?>
    <dc:creator><?php echo esc_specialchars(strval($item)) ?></dc:creator>
  <?php endforeach; ?>

  <?php foreach ($dc->subject as $item): ?>
    <dc:subject><?php echo esc_specialchars(strval($item)) ?></dc:subject>
  <?php endforeach; ?>

  <dc:description><?php echo esc_specialchars(strval($resource->scopeAndContent)) ?></dc:description>

  <?php if (isset($resource->repository)): ?>
    <dc:publisher><?php echo url_for(array($resource->repository, ‘module’ => ‘repository’), true) ?></dc:publisher>
    <dc:publisher><?php echo esc_specialchars(strval($resource->repository)) ?></dc:publisher>
  <?php endif; ?>

  <?php foreach ($resource->getContributors() as $item): ?>
    <dc:contributor><?php echo esc_specialchars(strval($item)) ?></dc:contributor>
  <?php endforeach; ?>

  <?php foreach ($resource->getDates() as $item): ?>
    <dc:date><?php echo Qubit::renderDate($item->startDate) ?></dc:date>
  <?php endforeach; ?>

  <?php foreach ($resource->getDates() as $item): ?>
    <dc:date><?php echo Qubit::renderDate($item->endDate) ?></dc:date>
  <?php endforeach; ?>

  <?php
    foreach ($dc->date as $item1) {
     foreach ($resource->getDates() as $item2) {
     }
    }
    if (esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate)."-".Qubit::renderDate($item2->endDate)) {
      echo "<dc:date>";
      echo esc_specialchars(strval($item1));
      echo "</dc:date>";
    }
  ?>

  <dc:type><?php echo esc_specialchars($levelOfDescription = $resource->getLevelOfDescription()->getName(array(‘cultureFallback’ => true))) ?></dc:type>

  <?php foreach ($dc->format as $item): ?>
    <dc:format><?php echo esc_specialchars(strval($item)) ?></dc:format>
  <?php endforeach; ?>

  <dc:identifier><?php echo esc_specialchars (strval($dc->identifier))?></dc:identifier>

  <dc:identifier><?php echo esc_specialchars(url_for(array($resource, 'module' => 'informationobject'), true)) ?></dc:identifier>

  <dc:source><?php echo esc_specialchars(strval($resource->locationOfOriginals)) ?></dc:source>

  <?php foreach ($resource->language as $code): ?>
    <dc:language xsi:type="dcterms:ISO639-3"><?php echo esc_specialchars(strval(strtolower($iso639convertor->getID3($code)))) ?></dc:language>
  <?php endforeach; ?>

  <?php
     if (isset($resource->digitalObjects[0])) {
     echo "<dc:relation>http://";
     echo $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '',$sf_request->getHost().$sf_request->getRelativeUrlRoot().$resource->digitalObjects[0]->getFullPath());
     echo "_142.jpg</dc:relation>";
     }
  ?>

  <?php foreach ($dc->coverage as $item): ?>
    <dc:coverage><?php echo esc_specialchars(strval($item)) ?></dc:coverage>
  <?php endforeach; ?>

  <dc:rights><?php echo esc_specialchars(strval($resource->accessConditions)) ?></dc:rights>

</oai_dc:dc>

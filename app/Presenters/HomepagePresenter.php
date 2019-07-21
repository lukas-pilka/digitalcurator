<?php

namespace App\Presenters;

use Nette;
use MongoDB\Client;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Core\ServiceBuilder;
use Tracy\Debugger;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
	public function renderDefault()
	{
		$this->template->item = null;

		$client = new Client("mongodb+srv://lukaspilka:Apollo11@digitalcurator-hw3um.mongodb.net/test?retryWrites=true&w=majority");
		$collection = $client->artpieces->items;

		$count = $collection->count();
		if (!$count) {
			$this->flashMessage('Database is emty.', 'warning');
		}
		else
		{
			$result = $collection->findOne([], [
				'skip' => rand(0, $collection->count() - 1),
				'limit' => 1,
			]);

			if ($result) {
				$item = $result->jsonSerialize();
				sscanf($item->ngInventoryId, "O-%d", $id);
				$item->url = 'http://sbirky.ngprague.cz/dielo/CZE:NG.O_'.$id;
		//		Debugger::barDump($item);
				$this->template->item = $item;
			}
		}
	}

	public function handleNext()
	{
		$this->redrawControl('detail');
	}

}

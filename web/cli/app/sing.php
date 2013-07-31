<?php

namespace CLI;

class Sing {

	public static function songs() {
		return array(
			0 => array(
				'artist' => "Metallica", 
				'album'  => "...And Justice for All", 
				'title'  => "Harvester of Sorrow", 
				'video'  => "551_hC414UY", 
				'lyrics' => "My life suffocates\nPlanting the seeds of hate\nI've loved, turned to hate\nTrapped far beyond my fate\nI give, you take this life that I forsake\nBeen cheated of my youth\nYou turned this lie to truth\n\nAnger, misery\nYou'll suffer unto me\n\nHarvester of sorrow\nLanguage of the mad\nHarvester of sorrow\n\nPure black, looking clear\nMy work is done soon here\nTry getting back to me\nGet back which used to be\nDrink up, shoot in\nLet the beatings begin\nDistributor of pain\nYour loss becomes my gain\n\nAnger, misery\nYou'll suffer unto me\n\nHarvester of sorrow\nLanguage of the mad\nHarvester of sorrow\n\nAll have said their prayers\nInvade their nightmares\nTo see into my eyes\nYou'll find where murder lies\nInfanticide\n\nHarvester of sorrow\nLanguage of the mad\nHarvester of sorrow\nLanguage of the mad\nHarvester of sorrow\nHarvester of sorrow\nHarvester of sorrow\nHarvester of sorrow\nHarvester of sorrow\nHarvester of sorrow\n"
			), 
			1 => array(
				'artist' => "Pantera", 
				'album'  => "Bar Beyond Driven", 
				'title'  => "Becoming", 
				'video'  => "2ht3XGhlfYs", 
				'lyrics' => "A long time ago I never knew myself. Then the memory\nOf shame birthed its gift.\nNo more. The small one, the weak one, the frightened one.\nRunning from beatings, deflating. I'm becoming more\nThan a man. More than you ever were. Driven and burning\nTo rise beyond Jesus.\n\nI'm born again with snakes eyes\nBecoming Godsize\n\nI found my life was slipping through my hands. Perhaps\nThrough death my life won't be so bad.\nI can see you, can fuck you, inside of you. Staring through\nYour eyes. Belittle your friends to serve me, to suck me,\nTo realize my saving grasp. I of suicide. I the unlord.\n\nI'm born again with snakes eyes\nBecoming Godsize\n"
			), 
			2 => array(
				'artist' => "Sepultura", 
				'album'  => "Chaos A.D.", 
				'title'  => "Territory", 
				'video'  => "Q_WHGV5bejk", 
				'lyrics' => "Unknown Man\nSpeaks To The World\nSucking Your Trust\nA Trap In Every World\n\nWar For Territory\nWar For Territory\n\nChoice Control\nBehind Propaganda\nPoor Information\nTo Manage Your Anger\n\nWar For Territory\nWar For Territory\n\nDictators' Speech\nBlasting Off Your Life\nRule To Kill The Urge\nDumb Assholes' Speech\n\nYears Of Fighting\nTeaching My Son\nTo Believe In That Man\nRacist Human Being\nRacist Ground Will Live\nShame And Regret\nOf The Pride\nYou've Once Possessed\n\nWar For Territory\nWar For Territory\n"
			), 
			3 => array(
				'artist' => "Sunny Day Real Estate", 
				'album'  => "Diary", 
				'title'  => "In Circles", 
				'video'  => "vDSsh7Ocv8o", 
				'lyrics' => "Meet Me There\nIn The Blue\nWhere Words Are Not\nFeeling Remains\nSincerity\nTrust In Me\nThrow Myself Into Your Door\n\nI Go\nIn Circles\nRunning Down\nIn Circles\nI'm Running Down\nIn Circles\nRunning Down\nIn Circles\nRunning Down\n\nMeet Me There\nIn The Blue\nWhere Words Are Not\nFeeling Remains\nAnd I Dream\nTo Heal Your Wounds\nBut I Bleed Myself\nI Bleed Myself\n\nI Go\nIn Circles\nRunning Down\nIn Circles\nI'm Running Down\nIn Circles\nRunning Down\nIn Circles\nRunning Down\nCircles\nIn Circles\nI Go\nIn Circles\nRunning Down\nIn Circles\nI'm Running Down\nIn Circles\nRunning Down\nIn Circles\nRunning Down\n"
			)
		);
	}

	public static function sing() {
		$songs = Sing::songs();
		$item  = array_rand( $songs );
		$link  = 'http://www.youtube.com/watch?v=' . $songs[$item]['video'];

		print 'Artist: ' . $songs[$item]['artist'] . "\n";
		print 'Album: '  . $songs[$item]['album'] . "\n";
		print 'Title: '  . '<a href="' . $link . '" target="_blank" title="Click to watch!">' . $songs[$item]['title'] . "</a>\n";
		print 'Lyrics: ' . "\n";
		print $songs[$item]['lyrics'];
	}

}

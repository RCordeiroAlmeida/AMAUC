<?php


class MONGOLIAN {


const ISOL = 1;
const MEDI = 2;
const FINA = 3;
const INIT = 4;


/* We don't have JOINING_TYPE_L and JOINING_TYPE_R since mongolian letters are dual joining. */
const JOINING_TYPE_N		= 0; // non joining
const JOINING_TYPE_U		= 1; // non joining
const JOINING_TYPE_D		= 2; // Dual joining
const JOINING_TYPE_C		= 3; // Cause joining
const JOINING_TYPE_T 		= 4; // Transparent


public static function FLAG($x) { return (1<<($x)); }

public static function get_joining_type($u) {
	if (0x1800 <= $u && $u <= 0x18AA) {
		if ($u == 0x1807 || $u == 0x180A) {
			/* sibe syllable boundary marker and mongolian niragu */
			return self::JOINING_TYPE_D;
		}
		if (0x180B <= $u && $u <= 0x180D) {
			/* mongolian free variation selectors */
			return self::JOINING_TYPE_T;
		}
		if (0x1820 <= $u && $u <= 0x1877) {
			/* letters */
			return self::JOINING_TYPE_D;
		}
		if (0x1880 <= $u && $u <= 0x18AA) {
			/* Ali Gali letters */
			return self::JOINING_TYPE_D;
		}
		return self::JOINING_TYPE_U;
	}

	if ($u == 0x200D) {	// ZWJ
		return self::JOINING_TYPE_C;
	}
//	if ($u == 0x202F) {
//		return self::JOINING_TYPE_N;
//	}

	return self::JOINING_TYPE_N;
}

public static function set_joining_masks(&$o) {
	$state = 0;	// 0 - previous character not willing to join, 1 - willing to join as INIT, 2 - willing to join as MEDI
	$statepos = -1;	// pos where last character was set as state 1 or 2
	$last = count($o)-1;
	for ($i = 0; $i < count($o); $i++) {
		$this_join_type = self::get_joining_type($o[$i]['uni']); 
		if ($this_join_type == self::JOINING_TYPE_N) {
			$state = 0;
			continue;
		}
		else if ($this_join_type == self::JOINING_TYPE_U) {
			$o[$i]['mask'] = self::FLAG(self::ISOL); 		// ??? Dont need this
			$state = 0;
			continue;
		}
		else if ($this_join_type == self::JOINING_TYPE_T) {
			continue;
		}
		else if ($this_join_type == self::JOINING_TYPE_D || $this_join_type == self::JOINING_TYPE_C) {
			if ($state == 0) {
				$o[$i]['mask'] = self::FLAG(self::ISOL);
				$state = 1;
				$statepos = $i;
			}
			else if ($state == 1) {
				$o[$i]['mask'] = self::FLAG(self::FINA);
				$o[$statepos]['mask'] = self::FLAG(self::INIT); 	// if next will join
				$state = 2;
				$statepos = $i;
			}
			else if ($state == 2) {
				$o[$i]['mask'] = self::FLAG(self::FINA);
				$o[$statepos]['mask'] = self::FLAG(self::MEDI);  // if next will join
				$state = 2;
				$statepos = $i;
			}
		}
	}
}


}	// end Class

?>
<!DOCTYPE html>

<!--
	mvp - Lehekülg, kus omades kasutajat on võimalik salvestada oma 3x3x3 või 2x2x2 ruubiku kuubiku lahenduste aegu (iga aja kohta ka segamise valem). Kasutajanime järgi otsides võimalik näha teiste lahenduste aegu. Enda infost lähtuvalt saada statistikat nagu:
			* kiireim aeg
			* kiireim 5 lahenduse keskmine
			* kiireim 12 lahenduse keskmine
			* 100 lahenduse keskmine
			* viimase 5 lahenduse keskmine
			* viimase 12 lahenduse keskmine
			* lahenduste arv kokku
 -->

<?php

	//var_dump($_GET);
	//echo '<br>';
	//var_dump($_POST);
	
	$signup_username_Error = '';
	$signup_password_Error = '';
	$signup_name_Error = '';
	$signup_email_Error = '';
	$date_of_birth_Error = '';
	$not_31_day_months = array('month4', 'month6', 'month9', 'month11');
	$days_more_than_28 = array('day29', 'day30', 'day31');
	$days_more_than_29 = array('day30', 'day31');
	
	
	if ( isset ( $_POST['signup_username'] ) ) {
		if ( empty ( $_POST['signup_username'] ) ) {
			$signup_username_Error = 'Väli kasutajatunnus on kohustuslik!';
		}
	}
	
	if ( isset ( $_POST['signup_password'] ) ) {
		if ( empty ( $_POST['signup_password'] ) ) {
			$signup_password_Error = 'Väli salasõna on kohustuslik!';
		} elseif ( strlen( $_POST['signup_password'] ) < 8 ) {
			$signup_password_Error = 'Salasõna peab olema vähemalt 8 tähemärki pikk!';
		}
	}
	
	if ( isset ( $_POST['signup_name'] ) ) {
		if ( empty ( $_POST['signup_name'] ) ) {
			$signup_name_Error = 'Väli nimi on kohustuslik!';
		}
	}
	
	if ( isset ( $_POST['signup_email'] ) ) {
		if ( empty ( $_POST['signup_email'] ) ) {
			$signup_email_Error = 'Väli E-post on kohustuslik!';
		}
	}
	
	if ( isset ( $_POST['day_of_birth'] ) ) {
		if ( $_POST['day_of_birth'] == 'day' ) {
			$date_of_birth_Error = 'Välja sünnikuupäev kõik lahtrid on kohustuslikud!';
		}
	}
	
	if ( isset ( $_POST['month_of_birth'] ) ) {
		if ( ( $_POST['month_of_birth'] ) == 'month' ) {
			$date_of_birth_Error = 'Välja sünnikuupäev kõik lahtrid on kohustuslikud!';
		} elseif ( in_array( $_POST['month_of_birth'], $not_31_day_months ) AND ( $_POST['day_of_birth'] == 'day31' ) ) {
			$date_of_birth_Error = 'Valitud kuus ei ole niipalju päevi!';
		}
	}
	
	if ( isset ( $_POST['year_of_birth'] ) ) {
		if ( $_POST['year_of_birth'] == 'year' ) {
			$date_of_birth_Error = 'Välja sünnikuupäev kõik lahtrid on kohustuslikud!';
		} elseif ( ( $_POST['month_of_birth'] == 'month2' ) AND ( substr( $_POST['year_of_birth'], -4 ) % 4 != 0 ) AND (  in_array ( $_POST['day_of_birth'], $days_more_than_28 ) ) ) {
			$date_of_birth_Error = 'Valitud kuus ei ole antud aastal niipalju päevi!';
		} elseif ( ( $_POST['month_of_birth'] == 'month2' ) AND ( substr( $_POST['year_of_birth'], -4 ) % 4 == 0 ) AND (  in_array ( $_POST['day_of_birth'], $days_more_than_29 ) ) ) {
			$date_of_birth_Error = 'Valitud kuus ei ole antud aastal niipalju päevi!';
		}
	}
	
	echo substr( $_POST['year_of_birth'], -4 ) % 4;
	
?>

<html>
	<head>
		<title> Kasutaja loomine </title>
	</head>
	<body>
	
	<!-- atribuudid asuvad algus tagi sees -->
	
		<h1>Logi sisse</h1>
				
		<form method = "POST">
		
<!-- välja üleval tekstina			<label> E-post </label> <br> -->
			<input name = "login_email" type = "email" placeholder = "E-post">
			<br>
			<br>
			<input name = "login_password" type = "password" placeholder = "Parool">
			<br>
			<br>
			<input type = "submit" value = "Logi sisse">
			
<!-- info saatmine kahel viisil>
1. urliga GET=url?m=v&m2=v2
2. varjatud POST
turvalisuse mõttes pole vahet, aga ebameeldiv, kui urli pealt PWd lugeda saab
-->
			
		</form>	
		
		
		
		<h1> Loo kasutaja </h1>	
		<form method = POST>
			<table>
				<tr>
					<td> <label> Kasutajatunnus: </label> </td>
					<td> <input size = '34' name = 'signup_username' type = 'text' placeholder = 'Kasutajatunnus'> </td>
					<td style = 'color:red'> <?php echo $signup_username_Error ?> </td>
				</tr>
				<tr>
					<td> <label> Salasõna: </label> </td>
					<td> <input size = '34' name = 'signup_password' type = 'password' placeholder = 'Salasõna'> </td>
					<td style = 'color:red'> <?php echo $signup_password_Error ?> </td>
				</tr>
				<tr>
					<td> <label> Nimi: </label> </td>
					<td> <input size = '34' name = 'signup_name' type = 'text' placeholder = 'Nimi'> </td>
					<td style = 'color:red'> <?php echo $signup_name_Error ?> </td>
				</tr>
				<tr>
					<td> <label> E-post: </label> </td>
					<td> <input size = '34' name = 'signup_email' type = 'email' placeholder = 'E-post'> </td>
					<td style = 'color:red'> <?php echo $signup_email_Error ?> </td>
				</tr>
				<tr>
					<td> <label> Sünnikuupäev: </label> </td>
					<td> 
						<select name = 'day_of_birth'>
							<option value = 'day'> --- Päev --- </option>
							<option	value =	'day1'>	1 </option>
							<option	value =	'day2'>	2 </option>
							<option	value =	'day3'>	3 </option>
							<option	value =	'day4'>	4 </option>
							<option	value =	'day5'>	5 </option>
							<option	value =	'day6'>	6 </option>
							<option	value =	'day7'>	7 </option>
							<option	value =	'day8'>	8 </option>
							<option	value =	'day9'>	9 </option>
							<option	value =	'day10'> 10	</option>
							<option	value =	'day11'> 11	</option>
							<option	value =	'day12'> 12	</option>
							<option	value =	'day13'> 13	</option>
							<option	value =	'day14'> 14	</option>
							<option	value =	'day15'> 15	</option>
							<option	value =	'day16'> 16	</option>
							<option	value =	'day17'> 17	</option>
							<option	value =	'day18'> 18	</option>
							<option	value =	'day19'> 19	</option>
							<option	value =	'day20'> 20	</option>
							<option	value =	'day21'> 21	</option>
							<option	value =	'day22'> 22	</option>
							<option	value =	'day23'> 23	</option>
							<option	value =	'day24'> 24	</option>
							<option	value =	'day25'> 25	</option>
							<option	value =	'day26'> 26	</option>
							<option	value =	'day27'> 27	</option>
							<option	value =	'day28'> 28	</option>
							<option	value =	'day29'> 29	</option>
							<option	value =	'day30'> 30	</option>
							<option	value =	'day31'> 31	</option>
						</select>
						<select name = 'month_of_birth'>
							<option	value = 'month'> --- Kuu --- </option>
							<option	value = 'month1'> Jaanuar </option>
							<option	value = 'month2'> Veebruar </option>
							<option	value = 'month3'> Märts </option>
							<option	value = 'month4'> Aprill </option>
							<option	value = 'month5'> Mai </option>
							<option	value = 'month6'> Juuni </option>
							<option	value = 'month7'> Juuli </option>
							<option	value = 'month8'> August </option>
							<option	value = 'month9'> September </option>
							<option	value = 'month10'> Oktoober </option>
							<option	value = 'month11'> November </option>
							<option	value = 'month12'> Detsember </option>
						</select>
						<select name = 'year_of_birth'>
							<option value = 'year'> --- Aasta --- </option>
							<option value = 'year1900'>	1900 </option>
							<option value = 'year1901'>	1901 </option>
							<option value = 'year1902'>	1902 </option>
							<option value = 'year1903'>	1903 </option>
							<option value = 'year1904'>	1904 </option>
							<option value = 'year1905'>	1905 </option>
							<option value = 'year1906'>	1906 </option>
							<option value = 'year1907'>	1907 </option>
							<option value = 'year1908'>	1908 </option>
							<option value = 'year1909'>	1909 </option>
							<option value = 'year1910'>	1910 </option>
							<option value = 'year1911'>	1911 </option>
							<option value = 'year1912'>	1912 </option>
							<option value = 'year1913'>	1913 </option>
							<option value = 'year1914'>	1914 </option>
							<option value = 'year1915'>	1915 </option>
							<option value = 'year1916'>	1916 </option>
							<option value = 'year1917'>	1917 </option>
							<option value = 'year1918'>	1918 </option>
							<option value = 'year1919'>	1919 </option>
							<option value = 'year1920'>	1920 </option>
							<option value = 'year1921'>	1921 </option>
							<option value = 'year1922'>	1922 </option>
							<option value = 'year1923'>	1923 </option>
							<option value = 'year1924'>	1924 </option>
							<option value = 'year1925'>	1925 </option>
							<option value = 'year1926'>	1926 </option>
							<option value = 'year1927'>	1927 </option>
							<option value = 'year1928'>	1928 </option>
							<option value = 'year1929'>	1929 </option>
							<option value = 'year1930'>	1930 </option>
							<option value = 'year1931'>	1931 </option>
							<option value = 'year1932'>	1932 </option>
							<option value = 'year1933'>	1933 </option>
							<option value = 'year1934'>	1934 </option>
							<option value = 'year1935'>	1935 </option>
							<option value = 'year1936'>	1936 </option>
							<option value = 'year1937'>	1937 </option>
							<option value = 'year1938'>	1938 </option>
							<option value = 'year1939'>	1939 </option>
							<option value = 'year1940'>	1940 </option>
							<option value = 'year1941'>	1941 </option>
							<option value = 'year1942'>	1942 </option>
							<option value = 'year1943'>	1943 </option>
							<option value = 'year1944'>	1944 </option>
							<option value = 'year1945'>	1945 </option>
							<option value = 'year1946'>	1946 </option>
							<option value = 'year1947'>	1947 </option>
							<option value = 'year1948'>	1948 </option>
							<option value = 'year1949'>	1949 </option>
							<option value = 'year1950'>	1950 </option>
							<option value = 'year1951'>	1951 </option>
							<option value = 'year1952'>	1952 </option>
							<option value = 'year1953'>	1953 </option>
							<option value = 'year1954'>	1954 </option>
							<option value = 'year1955'>	1955 </option>
							<option value = 'year1956'>	1956 </option>
							<option value = 'year1957'>	1957 </option>
							<option value = 'year1958'>	1958 </option>
							<option value = 'year1959'>	1959 </option>
							<option value = 'year1960'>	1960 </option>
							<option value = 'year1961'>	1961 </option>
							<option value = 'year1962'>	1962 </option>
							<option value = 'year1963'>	1963 </option>
							<option value = 'year1964'>	1964 </option>
							<option value = 'year1965'>	1965 </option>
							<option value = 'year1966'>	1966 </option>
							<option value = 'year1967'>	1967 </option>
							<option value = 'year1968'>	1968 </option>
							<option value = 'year1969'>	1969 </option>
							<option value = 'year1970'>	1970 </option>
							<option value = 'year1971'>	1971 </option>
							<option value = 'year1972'>	1972 </option>
							<option value = 'year1973'>	1973 </option>
							<option value = 'year1974'>	1974 </option>
							<option value = 'year1975'>	1975 </option>
							<option value = 'year1976'>	1976 </option>
							<option value = 'year1977'>	1977 </option>
							<option value = 'year1978'>	1978 </option>
							<option value = 'year1979'>	1979 </option>
							<option value = 'year1980'>	1980 </option>
							<option value = 'year1981'>	1981 </option>
							<option value = 'year1982'>	1982 </option>
							<option value = 'year1983'>	1983 </option>
							<option value = 'year1984'>	1984 </option>
							<option value = 'year1985'>	1985 </option>
							<option value = 'year1986'>	1986 </option>
							<option value = 'year1987'>	1987 </option>
							<option value = 'year1988'>	1988 </option>
							<option value = 'year1989'>	1989 </option>
							<option value = 'year1990'>	1990 </option>
							<option value = 'year1991'>	1991 </option>
							<option value = 'year1992'>	1992 </option>
							<option value = 'year1993'>	1993 </option>
							<option value = 'year1994'>	1994 </option>
							<option value = 'year1995'>	1995 </option>
							<option value = 'year1996'>	1996 </option>
							<option value = 'year1997'>	1997 </option>
							<option value = 'year1998'>	1998 </option>
							<option value = 'year1999'>	1999 </option>
							<option value = 'year2000'>	2000 </option>
							<option value = 'year2001'>	2001 </option>
							<option value = 'year2002'>	2002 </option>
							<option value = 'year2003'>	2003 </option>
							<option value = 'year2004'>	2004 </option>
							<option value = 'year2005'>	2005 </option>
							<option value = 'year2006'>	2006 </option>
							<option value = 'year2007'>	2007 </option>
							<option value = 'year2008'>	2008 </option>
							<option value = 'year2009'>	2009 </option>
							<option value = 'year2010'>	2010 </option>
							<option value = 'year2011'>	2011 </option>
							<option value = 'year2012'>	2012 </option>
							<option value = 'year2013'>	2013 </option>
							<option value = 'year2014'>	2014 </option>
							<option value = 'year2015'>	2015 </option>
							<option value = 'year2016'>	2016 </option>
						</select> </td>
					<td style = 'color:red'> <?php echo $date_of_birth_Error ?> </td>
				</tr>
				<tr>	
					<td> </td>
					<td style = 'text-align:right'> <input type = 'submit' value = 'Loo kasutaja!'> </td>
				</tr>
			</table>
		</form>
	</body>
</html>
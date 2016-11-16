<?php

class MarketAnalysisClass {

    public function analystRating($strong_buy, $buy, $hold, $underperform, $sell)
    {
        $total_raters = $strong_buy + $buy + $hold + $underperform + $sell;
        $percentage_strong_buy = round(($strong_buy / $total_raters) * 100, 2);
        $percentage_buy = round(($buy / $total_raters) * 100, 2);
        $percentage_hold = round(($hold / $total_raters) * 100, 2);
        $percentage_underperform = round(($underperform / $total_raters) * 100, 2);
        $percentage_sell = round(($sell / $total_raters) * 100, 2);
        $buy_ratings = $percentage_strong_buy + $percentage_hold + $percentage_buy;
        $sell_ratings = $percentage_hold + $percentage_sell + $percentage_underperform;
        $main_buy_ratings = $percentage_strong_buy + $percentage_buy;
        $main_sell_ratings = $percentage_sell + $percentage_underperform;
        if ($buy_ratings >= $sell_ratings) {
            if ($buy_ratings >= 50) {
                $analyst_rating = 5;

                if ($main_buy_ratings > 40 && $main_buy_ratings <= 50) {
                    $analyst_rating = 6;
                }
                if ($main_buy_ratings > 60 && $main_buy_ratings <= 80) {
                    $analyst_rating = 7;
                }
                if ($main_buy_ratings > 80 && $main_buy_ratings <= 90) {
                    $analyst_rating = 8;
                }
                if ($main_buy_ratings > 90 && $main_buy_ratings <= 95) {
                    $analyst_rating = 9;
                }
                if ($main_buy_ratings > 95) {
                    $analyst_rating = 10;
                }
            }
        }
        if ($buy_ratings < $sell_ratings) {
            if ($sell_ratings >= 50) {
                $analyst_rating = 5;

                if ($main_sell_ratings > 40 && $main_sell_ratings <= 60) {
                    $analyst_rating = 4;
                }
                if ($main_sell_ratings > 60 && $main_sell_ratings <= 80) {
                    $analyst_rating = 3;
                }
                if ($main_sell_ratings > 80 && $main_sell_ratings <= 90) {
                    $analyst_rating = 2;
                }
                if ($main_sell_ratings > 90) {
                    $analyst_rating = 1;
                }
            }
        }
        return $analyst_rating;
    }

    public function ftse100Symbols($symbol)
    {
        if ($symbol == "BT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "CCH") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "DC") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }

        if ($symbol == "IMB") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "INTU") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
         if ($symbol == "JMAT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "SKY") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "TUI") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "MDC") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "REX") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "RDSA") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "RR") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "WOS") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }

    }

    public function ftse250Symbols($symbol)
    {
        if ($symbol == "AA") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "ACA") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "AGK") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "AMFW") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "AO") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "ASL") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "BBOX") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "BHMG") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "BNKR") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "BOK") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "BRSN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "BTEM") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "BTG") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "CLDN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "CRST") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "CTY") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "DFS") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "DJAN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "DRTY") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "DTY") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "EDIN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "ELTA") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "ESNT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "FCSS") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "FCPT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "FEV") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "FGT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "FRCL") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "GCP") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "GSS") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "HMSF") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "HOME") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "HSTN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "HWDN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "HVPE") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "IPO") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "JAM") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "JE") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "JLIF") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "JMG") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "JRP") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "LRE") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "MGAM") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "MNKS") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "MPI") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "MRC") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "MYI") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "NBLS") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "NCC") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "NMC") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "PAYS") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "PAGE") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "PCT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "PLI") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "PNL") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "PTEC") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "P2P") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "RCP") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "RDI") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "RSE") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "SCIN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "SMT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "SYNT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "TED") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "TEM") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "TMPL") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "TRIG") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "TRY") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "UKCM") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "VM") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "WG") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "WKP") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "WPCT") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "WTAN") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
        if ($symbol == "WWH") {
            $incorrectSymbol = $symbol;
            return $incorrectSymbol;
        }
    }
}
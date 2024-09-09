<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class OpenAIController extends Controller
{
    public function index(Request $request)
    {
        $inputs = $request->all();
        $searchQuery = $inputs["search"] ?? "";
        $limit = $inputs["limit"] ?? 10;
        $page = $inputs["page"] ?? 1;
        $offset = ($page - 1) * $limit;

        $url = 'https://api.semanticscholar.org/graph/v1/paper/search?query=' . $searchQuery . '&limit=' . $limit . '&offset=' . $offset . '&fields=title,year,abstract,authors.name,journal,citationCount,publicationTypes,fieldsOfStudy,openAccessPdf,isOpenAccess,externalIds';

        $response = Http::withHeaders([
            'x-api-key' => 'XJd3rIHoMq8ytm6DIZMcP8dP01f5SOt84JhagCc3'
        ])->get($url);

        $arr = [];
        $i = 0;

        foreach ($response["data"] as $v) {
            $arr[$i]["paperId"] = $v["paperId"];
            $arr[$i]["title"] = $v["title"];
            $arr[$i]["abstract"] = $v["abstract"];
            $arr[$i]["journal"] = $v["journal"];
            $arr[$i]["authors"] = $v["authors"];
            $arr[$i]["year"] = $v["year"];
            $arr[$i]["doi"] = $v["externalIds"]["DOI"] ?? "";
            $arr[$i]["url"] = $v["openAccessPdf"]["url"] ?? "";
            $i++;
        }

        $url2 = 'https://export.arxiv.org/api/query?search_query=' . $searchQuery . '&start=' . $offset . '&max_results=' . $limit;

        $response = file_get_contents($url2);
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array_arxiv = json_decode($json, TRUE)["entry"];

        foreach ($array_arxiv as $v) {
            $arr[$i]["paperId"] = $v["paperId"] ?? "";
            $arr[$i]["title"] = $v["title"];
            $arr[$i]["abstract"] = $v["summary"];
            $arr[$i]["journal"] = $v["journal"] ?? "";
            $arr[$i]["authors"] = $v["authors"] ?? $v["author"];
            $arr[$i]["year"] = substr($v["published"], 0, 4);
            $arr[$i]["doi"] = $v["doi"]["__text"] ?? "";
            $arr[$i]["url"] = $v["id"] ?? "";
            $i++;
        }
        
          $url3 = 'https://api.unpaywall.org/v2/search?query=' . $searchQuery . '&is_oa=true&email=ssemma442@gmail.com';

        $response = Http::withHeaders([
           
        ])->get($url3);
         $response;

           foreach ($response["results"] as $v1) {
            $v= $v1["response"];
            $arr[$i]["paperId"] = $v["doi"];
            $arr[$i]["title"] = $v["title"];
            $arr[$i]["abstract"] = $v["abstract"]??"";
            $arr[$i]["journal"] = $v["journal_name"];
            $arr[$i]["authors"] = $v["z_authors"];
            $arr[$i]["year"] = $v["year"];
            $arr[$i]["doi"] = $v["doi"]?? "";
            $arr[$i]["url"] = $v["best_oa_location"]["url_for_pdf"] ?? "";
            $i++;
        }

        return response()->json([
            "articles" => $arr,
            "total_results" => count($arr),
            "page" => $page,
            "limit" => $limit
        ]);
    }
}

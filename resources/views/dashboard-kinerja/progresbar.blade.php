<style>
    .detail {
    
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    z-index: 10;
    bottom: calc(100% + 20px);
    /*bottom: 10px;*/
    text-align: left; 
    border-radius: 0.5vw;
    white-space: nowrap; 
    font-size: 0.7vw;
}


    .item:hover .detail {
        display: block;
    }
    
</style>
@foreach ($data["datasatker"] as $datasatker)
    <div class="item border-abu-abu" style="--clr: {{ $datasatker["warna"] }}; --val: {{ $datasatker["capkin_satker"] > 120 ? 120 : number_format($datasatker["capkin_satker"], 0) }}">
        <div class="label">{{ substr($datasatker["kode_satker"], 2, 2) }}</div>
        <div class="value">
            @if ($datasatker["kode_satker"] === $data["satker"])
                @if ($datasatker["capkin_satker"] > 120)
                    <b>120</b>
                @else
                    <b>
                        @if ($data["periode"] == 'tr1')
                            @if (!empty($data["datatabel"][$loop->index]["pk_target_1"])) 
                                @if ($data["datatabel"][$loop->index]["pk_target_1"] == 0 and $datasatker["capkin_satker"] == 0)
                                NA
                                @else
                                {{ number_format($datasatker["capkin_satker"], 0) }}
                                @endif
                            @else {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @endif
                        @if ($data["periode"] == 'tr2')
                            @if (!empty($data["datatabel"][$loop->index]["pk_target_2"])) 
                                @if ($data["datatabel"][$loop->index]["pk_target_2"] == 0 and $datasatker["capkin_satker"] == 0)
                                NA
                                @else
                                {{ number_format($datasatker["capkin_satker"], 0) }}
                                @endif
                            @else {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @endif
                        @if ($data["periode"] == 'tr3')
                            @if (!empty($data["datatabel"][$loop->index]["pk_target_3"])) 
                                @if ($data["datatabel"][$loop->index]["pk_target_3"] == 0 and $datasatker["capkin_satker"] == 0)
                                NA
                                @else
                                {{ number_format($datasatker["capkin_satker"], 0) }}
                                @endif
                            @else {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @endif
                        @if ($data["periode"] == 'th')
                            @if (!empty($data["datatabel"][$loop->index]["pk_target_4"])) 
                                @if ($data["datatabel"][$loop->index]["pk_target_4"] == 0 and $datasatker["capkin_satker"] == 0)
                                NA
                                @else
                                {{ number_format($datasatker["capkin_satker"], 0) }}
                                @endif
                            @else {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @endif
                        
                    </b>
                @endif
            @else
                @if ($datasatker["capkin_satker"] > 120)
                    120
                @else
                    @if ($data["periode"] == 'tr1')
                        @if (!empty($data["datatabel"][$loop->index]["pk_target_1"])) 
                            @if ($data["datatabel"][$loop->index]["pk_target_1"] == 0 and $datasatker["capkin_satker"] == 0)
                            NA
                            @else
                            {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @else {{ number_format($datasatker["capkin_satker"], 0) }}
                        @endif
                    @endif
                    @if ($data["periode"] == 'tr2')
                        @if (!empty($data["datatabel"][$loop->index]["pk_target_2"])) 
                            @if ($data["datatabel"][$loop->index]["pk_target_2"] == 0 and $datasatker["capkin_satker"] == 0)
                            NA
                            @else
                            {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @else {{ number_format($datasatker["capkin_satker"], 0) }}
                        @endif
                    @endif
                    @if ($data["periode"] == 'tr3')
                        @if (!empty($data["datatabel"][$loop->index]["pk_target_3"])) 
                            @if ($data["datatabel"][$loop->index]["pk_target_3"] == 0 and $datasatker["capkin_satker"] == 0)
                            NA
                            @else
                            {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @else {{ number_format($datasatker["capkin_satker"], 0) }}
                        @endif
                    @endif
                    @if ($data["periode"] == 'th')
                        @if (!empty($data["datatabel"][$loop->index]["pk_target_4"])) 
                            @if ($data["datatabel"][$loop->index]["pk_target_4"] == 0 and $datasatker["capkin_satker"] == 0)
                            NA
                            @else
                            {{ number_format($datasatker["capkin_satker"], 0) }}
                            @endif
                        @else {{ number_format($datasatker["capkin_satker"], 0) }}
                        @endif
                    @endif
                @endif
            @endif
        </div>
        <!-- Detail Container -->
        <div class="detail">
    <div style="text-align: left">
        <p>Satker &nbsp;: {{ $datasatker["nama_satker"] }}</p>
        
        <!--CAPAIAN-->
        @if(in_array($data['indikator'], ['i1','i6','i7']))
        <p>Capaian &nbsp;:
            @if ($data["periode"] == 'tr1')
            
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_1"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
            
            @endif
            @if ($data["periode"] == 'tr2')
           
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_2"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
            
            @endif
            @if ($data["periode"] == 'tr3')
            
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_3"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
            
            @endif
            @if ($data["periode"] == 'th')
           
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_3"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
           
            @endif
        </p>
        @elseif(in_array($data['indikator'], ['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11']))
        <p>Capaian &nbsp;: 
        @if ($data["periode"] == 'tr1')
            @if (!empty($data["datatabel"][$loop->index]["pk_realisasi_1"])) 
                {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_1"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }}
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
        @endif
        @if ($data["periode"] == 'tr2')
            @if (!empty($data["datatabel"][$loop->index]["pk_realisasi_2"])) 
                {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_2"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }}
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
        @endif
        @if ($data["periode"] == 'tr3')
            @if (!empty($data["datatabel"][$loop->index]["pk_realisasi_3"])) 
                {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_3"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }}
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
        @endif
        @if ($data["periode"] == 'th')
            @if (!empty($data["datatabel"][$loop->index]["pk_realisasi_4"])) 
                {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_4"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }}
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
        @endif
        </p>
        @elseif(in_array($data['indikator'], ['capkin']))
        <p>Capaian &nbsp;: 
            {{ number_format($data["datasatker"][$loop->index]["capkin_satker"], 0) }} persen
        </p>
        @else
        <p>Capaian &nbsp;:
            @if ($data["periode"] == 'tr1')
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_1"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["realisasi_tr1"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            
            @endif
            @if ($data["periode"] == 'tr2')
            
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_2"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["realisasi_tr2"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            
            @endif
            @if ($data["periode"] == 'tr3')
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_3"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["realisasi_tr3"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            
            @endif
            @if ($data["periode"] == 'th')
            {{ number_format($data["datatabel"][$loop->index]["pk_realisasi_3"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["realisasi_tr4"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            
            @endif
        </p>
        @endif
        
        
        <!--TARGET-->
        @if(in_array($data['indikator'], ['i1','i6','i7']))
        <p>Target &nbsp;:
            @if ($data["periode"] == 'tr1')
            @if (!empty($data["datahover"][$loop->index]["target_tr1"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_1"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
            @if ($data["periode"] == 'tr2')
            @if (!empty($data["datahover"][$loop->index]["target_tr2"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_2"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
            @if ($data["periode"] == 'tr3')
            @if (!empty($data["datahover"][$loop->index]["target_tr3"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_3"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
            @if ($data["periode"] == 'th')
            @if (!empty($data["datahover"][$loop->index]["target_tr4"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_4"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} 
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
        </p>
        @elseif(in_array($data['indikator'], ['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11']))
        <p>Target &nbsp;: 
            @if (!empty($data["datatabel"][$loop->index]["pk_target_4"])) 
                {{ number_format($data["datatabel"][$loop->index]["pk_target_4"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }}
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
        </p>
        @elseif(in_array($data['indikator'], ['capkin']))
        <p>Target &nbsp;: 
            {{ number_format($data["datasatker"][$loop->index]["target_satker"], 0) }} persen
        </p>
        @else
        
        <p>Target &nbsp;:
            @if ($data["periode"] == 'tr1')
            @if (!empty($data["datahover"][$loop->index]["target_tr1"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_1"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["target_tr1"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
            @if ($data["periode"] == 'tr2')
            @if (!empty($data["datahover"][$loop->index]["target_tr2"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_2"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["target_tr2"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
            @if ($data["periode"] == 'tr3')
            @if (!empty($data["datahover"][$loop->index]["target_tr3"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_3"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["target_tr3"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
            @if ($data["periode"] == 'th')
            @if (!empty($data["datahover"][$loop->index]["target_tr4"]))
            {{ number_format($data["datatabel"][$loop->index]["pk_target_4"], 0) }} {{ $data["datatabel"][$loop->index]["satuan"] }} ({{ number_format($data["datahover"][$loop->index]["target_tr4"], 0) }} {{ $data["datahover"][$loop->index]["satuan"] }})
            @else {{ number_format($datasatker["target_satker"], 0) }}
            @endif
            @endif
        </p>
        @endif
        <!-- Tambahkan detail lain sesuai kebutuhan -->
    </div>
</div>
    </div>
@endforeach
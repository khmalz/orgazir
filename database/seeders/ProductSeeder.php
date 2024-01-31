<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productsData = [
            // Makanan
            ['makanan', 'Nasi', 5000, 'https://upload.wikimedia.org/wikipedia/commons/2/2d/Nasi_dibentuk_bulat.jpg'],
            ['makanan', 'Ayam Goreng', 10000, 'https://www.astronauts.id/blog/wp-content/uploads/2023/04/Resep-Ayam-Goreng-Serundeng-ala-Rumahan-yang-Nggak-Kalah-Enak-dari-Restoran.jpg'],
            ['makanan', 'Ayam Kecap', 10000, 'https://i.ytimg.com/vi/kWcbkod-Guk/maxresdefault.jpg'],
            ['makanan', 'Ayam Opor', 10000, 'https://asset.kompas.com/crops/v_3HiPZ4Bv2WZ4vgZwiH7RrnVnE=/0x83:1000x750/750x500/data/photo/2021/07/19/60f4ff9a5a749.jpg'],
            ['makanan', 'Ikan Bawal', 7000, 'https://cdn.yummy.co.id/content-images/images/20200924/Nax7iSPnim0BTHKinwJIjbu0oz3Nzmww-31363030393336363537d41d8cd98f00b204e9800998ecf8427e.jpg?x-oss-process=image/resize,w_388,h_388,m_fixed,x-oss-process=image/format,webp'],
            ['makanan', 'Ikan Lele', 7000, 'https://kurio-img.kurioapps.com/22/09/26/ea665aec-bb3e-4232-9fa2-6b29197a5884.jpg'],
            ['makanan', 'Telor Dadar', 5000, 'https://img-global.cpcdn.com/recipes/4cac056c1b633b76/400x400cq70/photo.jpg'],
            ['makanan', 'Telor Bulat Sambal', 5000, 'https://static.cdntap.com/tap-assets-prod/wp-content/uploads/sites/24/2020/12/telur-balado-1.jpg?width=450&quality=90'],
            ['makanan', 'Sayur Sop', 2000, 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/07/24061805/Praktis-dan-Mudah-Ini-Resep-Sayur-Sop-yang-Gurih-dan-Lezat-untuk-Menu-Sehari-hari.jpg'],
            ['makanan', 'Sop Sawi', 2000, 'https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/sasefoto/original/42547_sup-tahu-sayur-sawi.JPG'],
            ['makanan', 'Tempe Orek', 2000, 'https://asset.kompas.com/crops/yVU4FOVQhlwB5tGAvNUtMqU_dg8=/0x0:1000x667/750x500/data/photo/2023/01/04/63b4c955ae458.jpeg'],
            ['makanan', 'Tempe Bacem', 2000, 'https://www.masakapahariini.com/wp-content/uploads/2018/07/thumb-2.jpg'],
            ['makanan', 'Mie', 2000, 'https://img-global.cpcdn.com/recipes/e963362adf76b7b5/680x482cq70/mie-goreng-sederhana-foto-resep-utama.jpg'],
            ['makanan', 'Kentang', 2000, 'https://cdn0-production-images-kly.akamaized.net/WZYZPMA5TseXST9AWCrnATkrGGo=/62x841:5670x4000/469x260/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2978831/original/070900100_1574827507-shutterstock_1375884227.jpg'],
            ['makanan', 'Perkedel', 3000, 'https://asset-2.tstatic.net/medan/foto/bank/images/resep-perkedel-rebon-enak.jpg'],

            // Cemilan
            ['cemilan', 'Tempe Goreng', 1000, 'https://asset-2.tstatic.net/kaltim/foto/bank/images/resep-tempe-goreng-tepung-ketumbar.jpg'],
            ['cemilan', 'Tahu Goreng', 2000, 'https://cdn.idntimes.com/content-images/community/2023/05/1920-deep-fried-stinky-tofu-with-pickled-cabbage-street-food-in-taiwan-compress27-c9066cb4026e922d539f3bbcc6a5bbd3.jpg'],
            ['cemilan', 'Kerupuk', 1000, 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2021/11/03020431/7.-Kalori-Kerupuk-Putih-dan-Bahayanya-Jika-Dikonsumsi-Berlebih.jpg.webp'],

            // Minuman
            ['minuman', 'Es Tawar', 2000, 'https://kaspin.sgp1.digitaloceanspaces.com/DataGambar/101536/barang/Mi10.png'],
            ['minuman', 'Es Teh Manis', 4000, 'https://asset.kompas.com/crops/toOljW__-UqEVhGAJe8UyPdZWnU=/92x67:892x600/750x500/data/photo/2023/08/23/64e59deb79bfb.jpg'],
            ['minuman', 'Teh Manis', 3000, 'https://asset-a.grid.id/crop/0x0:0x0/945x630/photo/2020/10/13/1521986007.jpg'],
            ['minuman', 'Es Jeruk', 6000, 'https://radarjabar.disway.id/upload/eda54b2dd73d6b531aaa6badbcf63c4e.jpg'],
        ];

        foreach ($productsData as $data) {
            $category = Category::where('text', $data[0])->first();
            $category->products()->create([
                'name' => $data[1],
                'standard_price' => $data[2],
                'image' => $data[3],
            ]);
        }
    }
}
